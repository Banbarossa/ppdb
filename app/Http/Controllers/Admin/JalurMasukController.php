<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JalurMasukRequest;
use App\Models\JalurMasuk;
use RealRashid\SweetAlert\Facades\Alert;

class JalurMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Jalur Pendaftaran";

        $data = JalurMasuk::orderBy('tanggal_mulai', 'asc')->get();
        return view('admin.jalur-masuk.index', [
            'title' => $title,
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['jalur'] = new JalurMasuk();
        $data['route'] = route('admin.jalur-pendaftaran.store');
        $data['method'] = 'post';
        $title = "Tambah Jalur Pendaftaran";
        return view('admin.jalur-masuk.create', ['title' => $title, 'data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JalurMasukRequest $request)
    {

        JalurMasuk::create($request->all());
        Alert::success('Success', 'Jalur Pendaftaran Berhasil Ditambahkan');
        return redirect()->route('admin.jalur-pendaftaran.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title_halaman = "Jalur Pendaftaran";
        $data = JalurMasuk::findOrFail($id);
        return view('admin.jalur-masuk.show', [
            'item' => $data,
            'title_halaman' => $title_halaman,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['jalur'] = JalurMasuk::findOrFail($id);
        $data['route'] = route('admin.jalur-pendaftaran.update', $id);
        $data['method'] = 'put';
        $title = "Tambah Jalur Pendaftaran";
        return view('admin.jalur-masuk.create', ['title' => $title, 'data' => $data]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JalurMasukRequest $request, string $id)
    {
        $data = JalurMasuk::findOrFail($id)->update($request->all());
        Alert::success('Success', 'Data Berhasil Diubah');
        return redirect()->route('admin.jalur-pendaftaran.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        JalurMasuk::findOrFail($id)->delete();
        Alert::success('Success', 'Data Berhasil Dihapus');
        return redirect()->route('admin.jalur-pendaftaran.index');
    }
}
