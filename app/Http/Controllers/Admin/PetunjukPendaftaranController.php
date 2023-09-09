<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PetunjukPendaftaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PetunjukPendaftaranController extends Controller
{
    public function index()
    {
        $data['model'] = PetunjukPendaftaran::find(1);
        if (!$data['model']) {
            $data['model'] = new PetunjukPendaftaran();
        }
        $data['route'] = route('admin.petunjuk.store');
        $data['method'] = 'post';
        $title = "Petunjuk Pendaftaran";
        return view('admin.petunjuk.create', compact('data', 'title'));

    }
    public function store(Request $request)
    {
        $request->validate([
            'petunjuk' => 'required',
        ]);

        $petunjuk = PetunjukPendaftaran::updateOrCreate(
            ['id' => 1],
            ['petunjuk' => $request->petunjuk]
        );

        Alert::success('success', 'Success');
        return redirect()->back();
    }
}
