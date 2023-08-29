<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jenjang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class jenjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Data Jenjang Pendidikan';
        $data = Jenjang::all();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $editRoute = route('admin.jenjang.edit', $data->id);
                    $editRoute = route('admin.jenjang.edit', $data->id);
                    $deleteRoute = route('admin.jenjang.destroy', $data->id);
                    return view('components.action-button', [
                        'editRoute' => $editRoute,
                        'editRoute' => $editRoute,
                        'deleteRoute' => $deleteRoute,
                    ]);
                })
                ->toJson();
        }
        return view('admin.jenjang.index', ['title' => $title]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataStore = $request->validate([
            'nama_jenjang' => 'required',
        ]);
        Jenjang::create($dataStore);
        Alert::success('success', 'Data Berhasil Ditambahkan');
        return redirect()->back();
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
        $title = "Edit Data Jenjang Pendidikan";
        $data = Jenjang::findOrFail($id);
        return view('admin.jenjang.edit', [
            'title' => $title,
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataStore = $request->validate([
            'nama_jenjang' => 'required',
        ]);
        $data = Jenjang::findOrFail($id)->update($dataStore);
        Alert::success('success', 'Data Berhasil diubah');
        return redirect()->route('admin.jenjang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Jenjang::findOrFail($id)->delete();
        Alert::success('Success', 'Data berhasil Dihapus');
        return redirect()->back();
    }
}
