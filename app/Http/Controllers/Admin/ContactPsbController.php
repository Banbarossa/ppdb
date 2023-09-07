<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactPsb;
use App\Models\PhonePsb;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class ContactPsbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = ContactPsb::get();
        return view('admin.contact.index', [
            'title' => 'Contact Panitia',
            'data' => $data,
        ]);
    }

    public function getWa(Request $request)
    {
        $data = PhonePsb::all();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $editRoute = route('admin.phone.edit', $data->id);
                    $deleteRoute = route('admin.phone.destroy', $data->id);
                    return view('components.action-button', ['editRoute' => $editRoute, 'deleteRoute' => $deleteRoute]);
                })
                ->toJson();
        }
    }

    public function getMedia(Request $request)
    {
        $data = ContactPsb::all();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $editRoute = route('admin.contact.edit', $data->id);
                    $deleteRoute = route('admin.contact.destroy', $data->id);
                    return view('components.action-button', ['editRoute' => $editRoute, 'deleteRoute' => $deleteRoute]);
                })
                ->toJson();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['jalur'] = new ContactPsb();
        $data['route'] = route('admin.contact.store');
        $data['method'] = 'post';
        $title = "Tambah Contact";
        return view('admin.contact.media-create', ['title' => $title, 'data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'media' => 'required',
            'alamat' => 'required',
        ]);

        ContactPsb::create([
            'media' => $request->media,
            'alamat' => $request->alamat,
            'url' => $request->url,
        ]);
        Alert::success('success', 'Data Berhasil ditambahkan');
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
        $data['jalur'] = ContactPsb::findOrFail($id);
        $data['route'] = route('admin.contact-media.update', $id);
        $data['method'] = 'put';
        $title = "Edit  Contact";
        return view('admin.media.create', ['title' => $title, 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'media' => 'required',
            'alamat' => 'required',
        ]);

        ContactPsb::findOrFail($id)->update([
            'media' => $request->media,
            'alamat' => $request->alamat,
            'url' => $request->url,
        ]);
        Alert::success('success', 'Data Berhasil diubah');
        return redirect()->route('admin.contact.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ContactPsb::findOrfail($id)->delete();
        Alert::success('success', 'Data Berhasil dihapus');
        return redirect()->route('admin.contact.index');
    }
}
