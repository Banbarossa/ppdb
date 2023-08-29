<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewStudent;
use App\Traits\ActiveYearTrait;
use Illuminate\Http\Request;

class SantriLulusController extends Controller
{
    use ActiveYearTrait;

    public function index(Request $request)
    {

        $tahun_aktif = $this->getActiveYear();

        $data = NewStudent::whereHas('user', function ($query) {
            $query->where('approval', 'approved');
        })
            ->where('tahun_id', $tahun_aktif->id)
            ->get();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($data) {
                    return $data->user->level_pendaftaran;

                })
                ->addColumn('action', function ($data) {
                    $showRoute = route('admin.siswa-baru.show', $data->id);
                    return view('components.action-button', [
                        'showRoute' => $showRoute,
                    ]);
                })

                ->toJson();
        }

        $title = 'Daftar Calon Siswa Baru';

        return view('admin.new-student.index', ['data' => $data, 'title' => $title]);
    }
}
