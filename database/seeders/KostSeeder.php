<?php
// database/seeders/KostSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kost;

class KostSeeder extends Seeder
{
    public function run()
    {
        $kosts = [
            [
                'name' => 'Wisma Soedirman',
                'address' => 'Dusun 2, Blater, Kec. Kalimanah, Kabupaten Purbalingga, Jawa Tengah',
                'owner_name' => 'Pak Deni',
                'phone' => '081234567890',
                'price_per_year' => 7500000,
                'distance_to_campus' => 600,
                'cleanliness' => 'Ya',
                'security' => 'TIdak',
                'food_access' => 'Mudah',
                'facilities' => ['Ruang Kumpul', 'Dapur', 'Tempat Parkir', 'Meja Belajar', 'Kulkas', 'Kamar Mandi', 'AC'],
                'description' => 'Kost nyaman dengan fasilitas lengkap'
            ],
            [
                'name' => 'Krikil Kost',
                'address' => 'Jl. Sudirman No. 456, Kota',
                'owner_name' => 'Pak Budi',
                'phone' => '081234567891',
                'price_per_year' => 6000000,
                'distance_to_campus' => 600,
                'cleanliness' => 'Tidak',
                'security' => 'Ya',
                'food_access' => 'Mudah',
                'facilities' => ['Dapur', 'Kamar Mandi Dalam', 'AC', 'Tempat Parkir', 'Meja Belajar'],
                'description' => 'Kost dengan AC dan kamar mandi dalam'
            ],
            [
                'name' => 'Princess Kost',
                'address' => 'Jl. Diponegoro No. 789, Kota',
                'owner_name' => 'Ibu Dewi',
                'phone' => '081234567892',
                'price_per_year' => 6500000,
                'distance_to_campus' => 650,
                'cleanliness' => 'Ya',
                'security' => 'Ya',
                'food_access' => 'Mudah',
                'facilities' => ['Ruang Kumpul', 'Dapur', 'Kulkas', 'AC', 'Tempat Parkir', 'Meja Belajar'],
                'description' => 'Kost mewah dengan fasilitas premium'
            ],
            [
                'name' => 'Wisma Kusuma',
                'address' => 'Jl. Gatot Subroto No. 321, Kota',
                'owner_name' => 'Pak Agus',
                'phone' => '081234567893',
                'price_per_year' => 5500000,
                'distance_to_campus' => 1400,
                'cleanliness' => 'Cukup',
                'security' => 'Ya',
                'food_access' => 'Sulit',
                'facilities' => ['Kulkas', 'Dapur', 'Tempat Parkir', 'Meja Belajar', 'Mesin Cuci'],
                'description' => 'Kost dengan kulkas dan mesin cuci'
            ],
            [
                'name' => 'NgeKost Bae',
                'address' => 'Jl. Ahmad Yani No. 654, Kota',
                'owner_name' => 'Ibu Rina',
                'phone' => '081234567894',
                'price_per_year' => 6000000,
                'distance_to_campus' => 2000,
                'cleanliness' => 'Ya',
                'security' => 'Ya',
                'food_access' => 'Sulit',
                'facilities' => ['Kulkas', 'Dapur', 'Ruang Kumpul', 'Tempat Parkir', 'Meja Belajar', 'Kamar Mandi Dalam'],
                'description' => 'Kost dengan fasilitas lengkap tapi agak jauh'
            ]
        ];

        foreach ($kosts as $kost) {
            Kost::create($kost);
        }
    }
}
