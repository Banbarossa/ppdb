<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class TahunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['tahun'] = Tahun::orderBy('id', 'desc')->get();
        $data['route'] = route('admin.tahun.store');
        $data['method'] = 'post';
        $title = "Daftar Tahun";

        if ($request->ajax()) {
            return DataTables::of($data['tahun'])
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $activasiRoute = route('admin.activasi-tahun', $data->id);
                    $editRoute = route('admin.tahun.edit', $data->id);
                    $deleteRoute = route('admin.tahun.destroy', $data->id);

                    if ($data->status == 'aktif') {
                        return "<div class='d-flex justify-content-end'><a href='{$editRoute}' class='btn btn-warning me-3'>Edit</a> <a href='{$deleteRoute}' class='btn btn-danger me-3'>Hapus</a> <div>";
                    } else {
                        return "<div class='d-flex justify-content-end'><a href='{$activasiRoute}' class='btn btn-success me-3'>Aktifkan</a> <a href='{$editRoute}' class='btn btn-warning me-3'>Edit</a> <a href='{$deleteRoute}' class='btn btn-danger me-3'>Hapus</a> <div>";
                    }
                })
                ->toJson();
        }

        return view('admin.tahun.index', [
            'data' => $data,
            'title' => $title,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['model'] = new Tahun();
        $data['route'] = route('admin.tahun.store');
        $data['method'] = 'post';
        $title = "Daftar Tahun";

        return view('admin.tahun.create', [
            'data' => $data,
            'title' => $title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|min:9',
        ]);

        Tahun::create([
            'tahun' => $request->tahun,
            'status' => 'tidak aktif',
        ]);

        Alert::success('Success', 'Data berhasil ditambahkan');
        return redirect()->route('admin.tahun.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['model'] = Tahun::find($id);
        $data['route'] = route('admin.tahun.update', $id);
        $data['method'] = 'put';
        $title = "Daftar Tahun";

        return view('admin.tahun.create', [
            'data' => $data,
            'title' => $title,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tahun' => 'required|min:9',
        ]);

        Tahun::findOrFail($id)->update([
            'tahun' => $request->tahun,
        ]);

        Alert::success('Success', 'Data berhasil diubah');
        return redirect()->route('admin.tahun.index');
    }

    public function aktifasiTahun($id)
    {
        Tahun::where('id', '!=', $id)->update([
            'status' => 'tidak aktif',
        ]);

        Tahun::where('id', $id)->update([
            'status' => 'aktif',
        ]);
        Alert::success('Success', 'Data Berhasil dirubah');
        return redirect()->route('admin.tahun.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tahun::findOrFail($id)->delete();
        Alert::success('success', 'Data berhasil dihapus');
        return redirect()->back();
    }
}
