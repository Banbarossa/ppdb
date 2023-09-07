<?php

namespace App\Http\Controllers;

use App\Models\NewStudent;
use App\Traits\ActiveYearTrait;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class KelulusanSantriBaruController extends Controller
{
    use ActiveYearTrait;
    public function index(Request $request, $id)
    {

        $tahun_aktif = $this->getActiveYear()->id;
        $data = NewStudent::with('jenjang')->whereHas('user', function ($query) {
            $query->where('level_pendaftaran', '>=', 4);
        })
            ->where('jenjang_id', $id)
            ->where('tahun_id', $tahun_aktif)
            ->get();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('select', function ($data) {
                    return "<input class='form-check-input checkbox' type='checkbox' value='{$data->id}' id='flexCheckDefault'>";
                })
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
                    $luluskanUrl = route('admin.kelulusan.satu', ['id' => $data->id]);
                    $viewUrl = route('admin.siswa-baru.show', ['id' => $data->id]);

                    if ($data->kelulusan == null) {
                        return "<a href='{$viewUrl}' class='btn btn-secondary me-2'>Lihat</a><a href='{$luluskanUrl}' class='btn btn-success'>Luluskan</a>";
                    } else {
                        return "<a href='{$viewUrl}' class='btn btn-secondary me-2'>Lihat</a>";
                    }

                })
                ->rawColumns(['select', 'action'])
                ->toJson();
        }

        $title = 'kelulusan Santri Baru';

        return view('admin.kelulusan.index', ['data' => $data, 'title' => $title]);
    }

    public function luluskan(Request $request)
    {
        $selectedData = $request->input('selectedData');
        $selectedDataArray = json_decode($selectedData);

        foreach ($selectedDataArray as $item) {
            $student = NewStudent::findOrFail($item);
            $student->update([
                'kelulusan' => true,
            ]);

        }

        Alert::success('success', 'Berhasil diluluskan');
        return redirect()->back();

    }

    public function luluskanSatu($id)
    {
        NewStudent::findOrFail($id)->update([
            'kelulusan' => true,
        ]);

        Alert::success('success', 'Berhasil diluluskan');
        return redirect()->back();
    }

}
