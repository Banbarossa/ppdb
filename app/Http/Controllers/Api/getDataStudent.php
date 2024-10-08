<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Models\NewStudent;
use App\Traits\ActiveYearTrait;

class getDataStudent extends Controller
{
    use ActiveYearTrait;
    public function getAll()
    {

        $tahun = $this->getActiveYear();

        $student = NewStudent::with('jenjang')->where('tahun_id', $tahun->id)->where('kelulusan', 1)->orderBy('nama')->get();

        return new StudentResource(true, 'Data Santri Baru', $student);

    }

    public function getOne($nisn)
    {

        $tahun = $this->getActiveYear();

        $student = NewStudent::with('jenjang', 'user')
            ->where('tahun_id', $tahun->id)
            ->where('kelulusan', 1)
            ->where('nisn', $nisn)
            ->first();

        return new StudentResource(true, 'Detail Santri Baru', $student);

    }

    public function status()
    {
        $tahun = $this->getActiveYear();
        $student = NewStudent::with('jenjang', 'user')
            ->where('tahun_id', $tahun->id)
            ->where('kelulusan', 1)
            ->distinct()
            ->pluck('status_rumah');

        return new StudentResource(true, 'Detail Santri Baru', $student);
    }

}
