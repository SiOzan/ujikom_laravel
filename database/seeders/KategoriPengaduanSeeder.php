<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriPengaduan;
use Illuminate\Support\Str;

class KategoriPengaduanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_kategori' => 'Kebersihan',
                'deskripsi' => 'Pengaduan terkait masalah kebersihan lingkungan atau fasilitas umum.',
            ],
            [
                'nama_kategori' => 'Keamanan',
                'deskripsi' => 'Laporan atau keluhan tentang keamanan lingkungan.',
            ],
            [
                'nama_kategori' => 'Infrastruktur',
                'deskripsi' => 'Pengaduan terkait jalan rusak, lampu jalan, atau fasilitas umum lainnya.',
            ],
            [
                'nama_kategori' => 'Pelayanan Publik',
                'deskripsi' => 'Keluhan terhadap pelayanan dari instansi pemerintah atau lembaga pelayanan publik.',
            ],
            [
                'nama_kategori' => 'Lain-lain',
                'deskripsi' => 'Kategori untuk pengaduan yang tidak termasuk dalam kategori utama.',
            ],
        ];

        foreach ($data as $item) {
            $slug = Str::slug($item['nama_kategori']);
            do {
                $randomString = Str::random(5);
                $uniqueSlug = $slug . '-' . $randomString;
            } while (KategoriPengaduan::where('slug', $uniqueSlug)->exists());

            KategoriPengaduan::create([
                'nama_kategori' => $item['nama_kategori'],
                'slug' => $uniqueSlug,
                'deskripsi' => $item['deskripsi'],
            ]);
        }
    }
}
