<?php
namespace App\Services;

use App\Models\Kost;
use App\Models\Criteria;
use App\Models\KostEvaluation;
use App\Models\SawResult;
use Illuminate\Support\Facades\DB;

class FuzzySawService
{
    public function processKostData()
    {
        DB::beginTransaction();
        
        try {
            // Hapus data evaluasi dan hasil sebelumnya
            KostEvaluation::truncate();
            SawResult::truncate();
            
            $kosts = Kost::where('is_active', true)->get();
            $criteria = Criteria::where('is_active', true)->get();
            
            // Step 1: Fuzzifikasi
            $this->fuzzification($kosts, $criteria);
            
            // Step 2: Normalisasi SAW
            $this->normalization($criteria);
            
            // Step 3: Perhitungan skor akhir dan ranking
            $this->calculateFinalScores();
            
            DB::commit();
            
            return [
                'success' => true,
                'message' => 'Perhitungan Fuzzy SAW berhasil diproses'
            ];
            
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ];
        }
    }
    
    private function fuzzification($kosts, $criteria)
    {
        foreach ($kosts as $kost) {
            foreach ($criteria as $criteria_item) {
                $rawValue = $this->getRawValue($kost, $criteria_item);
                $fuzzyValue = $this->convertToFuzzy($rawValue, $criteria_item);
                
                KostEvaluation::create([
                    'kost_id' => $kost->id,
                    'criteria_id' => $criteria_item->id,
                    'raw_value' => $rawValue,
                    'fuzzy_value' => $fuzzyValue,
                    'normalized_value' => 0 // akan diisi saat normalisasi
                ]);
            }
        }
    }
    
    private function getRawValue($kost, $criteria)
    {
        switch ($criteria->code) {
            case 'C1': // Biaya
                return $kost->price_per_year / 1000000; // dalam jutaan
            case 'C2': // Jarak
                return $kost->distance_to_campus / 1000; // dalam km
            case 'C3': // Fasilitas
                return $kost->facility_count;
            case 'C4': // Kebersihan
                return $this->mapCleanlinessToNumber($kost->cleanliness);
            case 'C5': // Keamanan
                return $kost->security === 'Ya' ? 1 : 0;
            case 'C6': // Akses Makanan
                return $kost->food_access === 'Mudah' ? 1 : 0;
            default:
                return 0;
        }
    }
    
    private function convertToFuzzy($rawValue, $criteria)
    {
        switch ($criteria->code) {
            case 'C1': // Biaya (cost - semakin rendah semakin baik)
                if ($rawValue >= 7) return 0;      // Sangat Mahal
                if ($rawValue >= 6) return 2.5;   // Mahal
                if ($rawValue >= 5.5) return 5;   // Cukup
                if ($rawValue >= 4) return 7.5;   // Murah
                return 10;                         // Sangat Murah
                
            case 'C2': // Jarak (cost - semakin dekat semakin baik)
                if ($rawValue >= 2) return 0;     // Sangat Jauh
                if ($rawValue >= 1.5) return 2.5; // Jauh
                if ($rawValue >= 1) return 5;     // Cukup
                if ($rawValue >= 0.5) return 7.5; // Dekat
                return 10;                         // Sangat Dekat
                
            case 'C3': // Fasilitas (benefit - semakin banyak semakin baik)
                if ($rawValue >= 8) return 10;    // Sangat Lengkap
                if ($rawValue >= 6) return 7.5;   // Lengkap
                if ($rawValue >= 5) return 5;     // Cukup
                if ($rawValue >= 4) return 2.5;   // Kurang
                return 0;                          // Sangat Kurang
                
            case 'C4': // Kebersihan (benefit)
                if ($rawValue >= 2) return 10;    // Ya/Tinggi
                if ($rawValue >= 1) return 5;     // Cukup
                return 0;                          // Tidak/Rendah
                
            case 'C5': // Keamanan (benefit)
                return $rawValue == 1 ? 10 : 0;   // Ya = 10, Tidak = 0
                
            case 'C6': // Akses Makanan (benefit)
                return $rawValue == 1 ? 10 : 0;   // Mudah = 10, Sulit = 0
                
            default:
                return 0;
        }
    }
    
    private function mapCleanlinessToNumber($cleanliness)
    {
        switch ($cleanliness) {
            case 'Ya': return 2;
            case 'Cukup': return 1;
            case 'Tidak': return 0;
            default: return 0;
        }
    }
    
    private function normalization($criteria)
    {
        foreach ($criteria as $criteria_item) {
            $evaluations = KostEvaluation::where('criteria_id', $criteria_item->id)->get();
            
            if ($criteria_item->isBenefit()) {
                // Untuk benefit: Rij = Xij / Max(Xij)
                $maxValue = $evaluations->max('fuzzy_value');
                if ($maxValue > 0) {
                    foreach ($evaluations as $evaluation) {
                        $evaluation->update([
                            'normalized_value' => $evaluation->fuzzy_value / $maxValue
                        ]);
                    }
                }
            } else {
                // Untuk cost: Rij = Min(Xij) / Xij
                $minValue = $evaluations->min('fuzzy_value');
                if ($minValue > 0) {
                    foreach ($evaluations as $evaluation) {
                        $normalizedValue = $evaluation->fuzzy_value > 0 
                            ? $minValue / $evaluation->fuzzy_value 
                            : 0;
                        $evaluation->update([
                            'normalized_value' => $normalizedValue
                        ]);
                    }
                }
            }
        }
    }
    
    private function calculateFinalScores()
    {
        $kosts = Kost::where('is_active', true)->get();
        $criteria = Criteria::where('is_active', true)->get();
        $results = [];
        
        foreach ($kosts as $kost) {
            $finalScore = 0;
            
            foreach ($criteria as $criteria_item) {
                $evaluation = KostEvaluation::where('kost_id', $kost->id)
                    ->where('criteria_id', $criteria_item->id)
                    ->first();
                
                if ($evaluation) {
                    $finalScore += $evaluation->normalized_value * ($criteria_item->weight / 10);
                }
            }
            
            $results[] = [
                'kost_id' => $kost->id,
                'final_score' => $finalScore,
                'calculated_at' => now()
            ];
        }
        
        // Sort berdasarkan skor tertinggi
        usort($results, function($a, $b) {
            return $b['final_score'] <=> $a['final_score'];
        });
        
        // Simpan hasil dengan ranking
        foreach ($results as $index => $result) {
            SawResult::create([
                'kost_id' => $result['kost_id'],
                'final_score' => $result['final_score'],
                'rank' => $index + 1,
                'calculated_at' => $result['calculated_at']
            ]);
        }
    }
    
    public function getTopRecommendations($limit = 5)
    {
        return SawResult::with('kost')
            ->orderBy('rank', 'asc')
            ->limit($limit)
            ->get();
    }
}