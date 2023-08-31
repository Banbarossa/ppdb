<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhonePsb;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $data = PhonePsb::get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $editRoute = route('admin.contact-wa.edit', $data->id);
                    return view('components.action-button', [
                        'editRoute' => $editRoute,
                    ]);
                })
                ->make(true);
        }

        return view('admin.contact.index', [
            'title' => 'Contact Whatsapp Panitia',
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['jalur'] = new PhonePsb();
        $data['route'] = route('admin.contact-wa.store');
        $data['method'] = 'post';
        $title = "Tambah No WA";
        return view('admin.contact.create', ['title' => $title, 'data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'no_wa' => 'required',
        ]);

        PhonePsb::create($validatedData);
        Alert::success('success', 'Data Berhasil Ditambahkan');
        return redirect()->route('admin.contact-wa.index');
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
        $data['route'] = route('admin.contact-wa.update', $id);
        $data['method'] = 'put';
        $title = "Ubah Data No Wa";
        return view('admin.contact.create', ['title' => $title, 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'no_wa' => 'required',
        ]);

        PhonePsb::findOrFail($id)->update($validatedData);
        Alert::success('success', 'Data Berhasil diubah');
        return redirect()->route('admin.contact-wa.index');
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
