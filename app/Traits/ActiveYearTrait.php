<?php
namespace App\Traits;

use App\Models\Tahun;

trait ActiveYearTrait
{
    public function getActiveYear()
    {
        return Tahun::where('status', 'aktif')->first();
    }
}
