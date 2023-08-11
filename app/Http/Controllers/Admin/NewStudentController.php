<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewStudent;
use App\Models\Tahun;

class NewStudentController extends Controller
{
    public function index()
    {

        $tahun_aktif = Tahun::where('status', 'aktif')->first();
        $data = NewStudent::whereHas('user', function ($query) {
            $query->where('approval', 'approved');
        })
            ->where('tahun_id', $tahun_aktif->id)
            ->paginate();

        $title = 'Daftar Calon Siswa Baru';

        return view('admin.new-student.index', ['data' => $data, 'title' => $title]);
    }

    public function show($id)
    {
        $data = NewStudent::whereHas('user', function ($query) {
            $query->where('approval', 'approved');
        })
            ->where('id', $id)
            ->first();

        $title = 'Detail data siswa';
        return view('admin.new-student.show', ['data' => $data]);
    }
}
