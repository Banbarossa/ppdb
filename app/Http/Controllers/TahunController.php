<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TahunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Tahun::orderBy('id', 'desc')->paginate(10);
        $title = "Daftar Tahun";

        $query = $request->input('query');
        if ($query) {
            $data = Tahun::search($query);
        }

        return view('admin.tahun.index', [
            'data' => $data,
            'title' => $title,
            'query' => $query,
        ]);
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
        //
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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tahun_tidak_aktif = Tahun::where('id', '!=', $id)->update([
            'status' => 'tidak aktif',
        ]);

        $tahun_aktif = Tahun::where('id', $id)->update([
            'status' => 'aktif',
        ]);
        Alert::success('Success', 'Data Berhasil dirubah');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
