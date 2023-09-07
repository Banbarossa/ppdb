<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jenjang;
use App\Models\NewStudent;
use App\Traits\ActiveYearTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NewStudentController extends Controller
{
    use ActiveYearTrait;
    public function index(Request $request)
    {

        $tahun_aktif = $this->getActiveYear()->id;
        $data = NewStudent::whereHas('user', function ($query) {
            $query->where('approval', 'approved');
        })
            ->where('tahun_id', $tahun_aktif)
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

    public function show($id)
    {

        $data = NewStudent::with('jenjang')->whereHas('user', function ($query) {
            $query->where('approval', 'approved');
        })
            ->where('id', $id)
            ->first();

        // dd($data);

        $title = 'Detail data siswa';
        return view('admin.new-student.show', ['data' => $data, 'title' => $title]);
    }

    public function getJenjangPendidikan(Request $request, $id)
    {
        $tahun_aktif = $this->getActiveYear()->id;
        $data = NewStudent::whereHas('user', function ($query) {
            $query->where('approval', 'approved');
        })
            ->where('tahun_id', $tahun_aktif)
            ->where('jenjang_id', $id)
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

        $jenjang = Jenjang::find($id);
        $title = 'Daftar Calon Siswa Baru ' . $jenjang->nama_jenjang;

        return view('admin.new-student.jenjang', ['data' => $data, 'title' => $title]);

    }
}
