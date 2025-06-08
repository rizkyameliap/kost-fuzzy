<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Criteria;

class CriteriaSeeder extends Seeder
{
    public function run()
    {
        $criteria = [
            [
                'code' => 'C1',
                'name' => 'Biaya Kost',
                'description' => 'Biaya sewa kost per tahun',
                'weight' => 7.5,
                'type' => 'cost'
            ],
            [
                'code' => 'C2',
                'name' => 'Jarak ke Kampus',
                'description' => 'Jarak kost ke kampus dalam meter',
                'weight' => 2.5,
                'type' => 'cost'
            ],
            [
                'code' => 'C3',
                'name' => 'Ketersediaan Fasilitas',
                'description' => 'Jumlah dan kualitas fasilitas yang tersedia',
                'weight' => 7.5,
                'type' => 'benefit'
            ],
            [
                'code' => 'C4',
                'name' => 'Kebersihan',
                'description' => 'Tingkat kebersihan kost',
                'weight' => 10,
                'type' => 'benefit'
            ],
            [
                'code' => 'C5',
                'name' => 'Keamanan Kost',
                'description' => 'Tingkat keamanan lingkungan kost',
                'weight' => 10,
                'type' => 'benefit'
            ],
            [
                'code' => 'C6',
                'name' => 'Akses Makanan',
                'description' => 'Kemudahan akses ke tempat makan',
                'weight' => 5,
                'type' => 'benefit'
            ]
        ];
        
        foreach ($criteria as $criterion) {
            Criteria::create($criterion);
        }
    }
}