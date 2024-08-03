<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewStudent;
use App\Traits\ActiveYearTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PendaftranUlangController extends Controller
{
    use ActiveYearTrait;
    public function index(Request $request, String $id)
    {
        $tahun_aktif = $this->getActiveYear()->id;
        $data = NewStudent::with('jenjang')->whereHas('user', function ($query) {
            $query->where('level_pendaftaran', '>=', 7);
        })
            ->where('jenjang_id', $id)
            ->where('tahun_id', $tahun_aktif)
            ->get();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($data) {
                    return $data->user->level_pendaftaran;

                })
                ->addColumn('jenjang', function ($data) {
                    return $data->jenjang->nama_jenjang;

                })
                ->addColumn('kelulusan', function ($data) {
                    return $data->kelulusan;

                })
                ->addColumn('action', function ($data) {
                    // $luluskanUrl = route('admin.daftarulang.show', ['id' => $data->id]);
                    $viewUrl = route('admin.daftarulang.show', ['id' => $data->id]);

                    return "<a href='{$viewUrl}' class='btn btn-secondary me-2'>Lihat</a>";
                })
                ->rawColumns(['select', 'action'])
                ->toJson();
        }

        $title = 'Calon Santri Yang sudah Mendaftar Ulang secara lengkap';

        return view('admin.daftar-ulang.index', ['title' => $title]);

    }
    public function unregistered(Request $request)
    {
        $tahun_aktif = $this->getActiveYear()->id;
        $data = NewStudent::with('jenjang')->whereHas('user', function ($query) {
            $query->where('level_pendaftaran', '<=', 7);
        })
            ->where('kelulusan', true)
            ->where('tahun_id', $tahun_aktif)
            ->get();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('jenjang', function ($data) {
                    return $data->jenjang->nama_jenjang;

                })
                ->addColumn('action', function ($data) {
                    // $luluskanUrl = route('admin.kelulusan.satu', ['id' => $data->id]);
                    $viewUrl = route('admin.daftarulang.show', ['id' => $data->id]);

                    return "<a href='{$viewUrl}' class='btn btn-secondary me-2'>Lihat</a>";
                })
                ->toJson();
        }

        $title = 'Calon Santri Yang Belum Mendaftar Ulang';

        return view('admin.daftar-ulang.index', ['title' => $title]);
    }

    public function show($id)
    {

        $data = NewStudent::findOrFail($id);
        return view('admin.daftar-ulang.show', ['data' => $data]);
    }
}
