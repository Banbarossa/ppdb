<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JalurMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nama_jalur = ['Jalur Prestasi', 'Reguler Gel-I', 'Reguler Gel-II'];

        foreach ($nama_jalur as $item) {
            \App\Models\JalurMasuk::create([
                'nama_jalur' => $item,
                'deskripsi' => fake()->text(200),
                'biaya_pendaftaran' => 300000,
                'tanggal_mulai' => fake()->date(),
                'tanggal_akhir' => fake()->date(),

            ]);
        }

    }
}
