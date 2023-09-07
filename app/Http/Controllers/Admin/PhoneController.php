<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhonePsb;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['jalur'] = new PhonePsb();
        $data['route'] = route('admin.phone.store');
        $data['method'] = 'post';
        $title = "Tambah No WA";
        return view('admin.contact.phone-create', ['title' => $title, 'data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $no_wa = str_replace([' ', '-', '+'], '', $request->no_wa);

        $request->validate([
            'nama' => 'required',
            'no_wa' => 'required',
        ]);

        PhonePsb::create([
            'nama' => $request->nama,
            'no_wa' => $no_wa,
        ]);
        Alert::success('success', 'Data Berhasil Ditambahkan');
        return redirect()->route('admin.contact.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['jalur'] = PhonePsb::findOrFail($id);
        $data['route'] = route('admin.phone.update', $id);
        $data['method'] = 'put';
        $title = "Ubah Data No Wa";
        return view('admin.contact.phone-create', ['title' => $title, 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $no_wa = str_replace([' ', '-', '+'], '', $request->no_wa);
        $request->validate([
            'nama' => 'required',
            'no_wa' => 'required',
        ]);

        PhonePsb::findOrFail($id)->update([
            'nama' => $request->nama,
            'no_wa' => $no_wa,
        ]);
        Alert::success('success', 'Data Berhasil diubah');
        return redirect()->route('admin.contact.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PhonePsb::findOrFail($id)->delete();
        Alert::success('Info', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
