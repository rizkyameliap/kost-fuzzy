<?php
// database/seeders/UserSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Admin SPK',
            'email' => 'admin@spk.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        
        // Mahasiswa contoh
        User::create([
            'name' => 'Amel',
            'email' => 'rizky.amelia.p@mhs.unsoed.ac.id',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
            'nim' => 'H1D023017',
            'jurusan' => 'Informatika',
        ]);
        
    }
}