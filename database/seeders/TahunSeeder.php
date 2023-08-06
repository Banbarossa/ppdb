<?php

namespace Database\Seeders;

use App\Models\Tahun;
use Illuminate\Database\Seeder;

class TahunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Tahun::create([
            'tahun' => '2023/2024',
            'status' => 'aktif',
        ]);

        $data = ['2024/2025', '2025/2026', '2026/2027'];
        foreach ($data as $item) {
            Tahun::create([
                'tahun' => $item,
                'status' => 'tidak aktif',
            ]);
        }
    }
}
