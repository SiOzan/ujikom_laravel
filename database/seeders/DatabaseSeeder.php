<?php
namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name'     => "Admin Tampan",
            'email'    => "admin@gmail.com",
            'password' => Hash::make('12345678'),
            'role'     => "Admin",
        ]);

        User::factory()->create([
            'name'     => "Admin Manis",
            'email'    => "siadmin@gmail.com",
            'password' => Hash::make('12345678'),
            'role'     => "Admin",
        ]);

        DB::table('users')->insert([
            [
                'name'     => "Abdu Rifai",
                'email'    => "abdu@gmail.com",
                'password' => Hash::make('12345678'),
                'role'     => "Petugas",
            ],
            [
                'name'     => "Azmi Fatahilah",
                'email'    => "azmi@gmail.com",
                'password' => Hash::make('12345678'),
                'role'     => "Petugas",
            ],
            [
                'name'     => "Zahira Kurnia Anandita",
                'email'    => "zahira@gmail.com",
                'password' => Hash::make('12345678'),
                'role'     => "Petugas",
            ],
            [
                'name'     => "Adit",
                'email'    => "adit@gmail.com",
                'password' => Hash::make('12345678'),
                'role'     => "Petugas",
            ],
        ]);

        $this->call([
            KategoriPengaduanSeeder::class,
            SaranSeeder::class,
        ]);
    }
}
