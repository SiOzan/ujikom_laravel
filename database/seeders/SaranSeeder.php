<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sarans')->insert([
            [
                'nama' => 'Andi Prasetyo',
                'email' => 'andi@example.com',
                'judul' => 'Tampilan Website',
                'deskripsi' => 'Saya menyarankan agar tampilan website dibuat lebih responsif untuk pengguna mobile.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Rina Maharani',
                'email' => 'rina@example.com',
                'judul' => 'Proses Pengaduan Lama',
                'deskripsi' => 'Proses pengaduan sebaiknya dipercepat. Saat ini terlalu lama mendapatkan respon.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'judul' => 'Fitur Tracking Pengaduan',
                'deskripsi' => 'Akan lebih baik jika ada fitur untuk melacak status pengaduan yang sudah diajukan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Siti Aminah',
                'email' => 'siti@example.com',
                'judul' => 'Informasi Tidak Lengkap',
                'deskripsi' => 'Beberapa informasi di halaman FAQ belum lengkap. Mohon ditambahkan agar lebih jelas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Dedi Kurniawan',
                'email' => 'dedi@example.com',
                'judul' => 'Layanan CS Kurang Ramah',
                'deskripsi' => 'Customer service perlu diberikan pelatihan agar lebih ramah dalam melayani.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
