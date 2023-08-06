<?php

namespace Database\Seeders;

use App\Models\Jenjang;
use Illuminate\Database\Seeder;

class JenjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenjang = ['SD Plus', 'SMP Plus', 'MAS'];
        foreach ($jenjang as $item) {
            Jenjang::create([
                'nama_jenjang' => $item,
            ]);
        }
    }
}
