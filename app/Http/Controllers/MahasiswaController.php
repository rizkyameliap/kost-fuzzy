<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SawResult;
use App\Services\FuzzySawService;

class MahasiswaController extends Controller
{
    protected $fuzzySawService;
    
    public function __construct(FuzzySawService $fuzzySawService)
    {
        $this->middleware('auth');
        $this->fuzzySawService = $fuzzySawService;
    }
    
    public function dashboard()
    {
        $topRecommendations = $this->fuzzySawService->getTopRecommendations(5);
        return view('mahasiswa.dashboard', compact('topRecommendations'));
    }
    
    public function recommendations(Request $request)
    {
        $query = SawResult::with('kost')->orderBy('rank', 'asc');
        
        // Filter berdasarkan maksimal biaya
        if ($request->filled('max_price')) {
            $query->whereHas('kost', function($q) use ($request) {
                $q->where('price_per_year', '<=', $request->max_price);
            });
        }
        
        // Filter berdasarkan minimal fasilitas
        if ($request->filled('min_facilities')) {
            $query->whereHas('kost', function($q) use ($request) {
                $q->where('facility_count', '>=', $request->min_facilities);
            });
        }
        
        // Filter berdasarkan keamanan
        if ($request->filled('security')) {
            $query->whereHas('kost', function($q) use ($request) {
                $q->where('security', $request->security);
            });
        }
        
        $recommendations = $query->paginate(10);
        
        return view('mahasiswa.recommendations', compact('recommendations'));
    }
}