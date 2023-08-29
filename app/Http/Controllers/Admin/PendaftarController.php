<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ActiveYearTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PendaftarController extends Controller
{
    use ActiveYearTrait;
    public function getPending(Request $request)
    {

        $status = $request->status;

        $tahun = $this->getActiveYear()->id;

        $data = User::where('tahun_id', $tahun)
            ->where('approval', $status)
            ->orderBy('created_at', 'desc')->get();
        $title = 'List Pendaftaran Santri baru dengan status ' . $status;

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $showRoute = route('admin.user-register.show', $data->id);
                    return view('components.action-button', [
                        'showRoute' => $showRoute,
                    ]);
                })
                ->toJson();
        }

        return view('admin.user.pending', ['data' => $data, 'title' => $title]);

    }
}
