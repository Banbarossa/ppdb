<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactPsb;
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
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $editRoute = route('admin.contact-media.edit', $data->id);
                    return view('components.action-button', [
                        'editRoute' => $editRoute,
                    ]);
                })
                ->make(true);
        }

        return view('admin.media.index', [
            'title' => 'Contact Panitia',
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['jalur'] = new ContactPsb();
        $data['route'] = route('admin.contact-media.store');
        $data['method'] = 'post';
        $title = "Tambah Contact";
        return view('admin.media.create', ['title' => $title, 'data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
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
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ContactPsb::findOrfail($id)->delete();
        Alert::success('success', 'Data Berhasil ditambahkan');
        return redirect()->route('admin.contact-media.index');
    }
}
