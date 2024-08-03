<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JalurMasukRequest;
use App\Models\JalurMasuk;
use Illuminate\Support\Facades\Storage;
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

        $file_required = false;

        if ($request->file_required == 'on') {
            $file_required = true;
        };
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();

        $filePath = $image->move(public_path('jalur'), $request->nama_jalur . '.' . $extension);

        JalurMasuk::create([
            'nama_jalur' => $request->nama_jalur,
            'biaya_pendaftaran' => $request->biaya_pendaftaran,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'meta_description' => $request->meta_description,
            'deskripsi' => $request->deskripsi,
            'image' => $request->nama_jalur . '.' . $extension,
            'file_required' => $file_required,
        ]);
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
        $file_required = false;
        if ($request->file_required == 'on') {
            $file_required = true;
        };

        $data = JalurMasuk::findOrFail($id);
        $file = $data->image;

        $newFile = $request->file('image');

        if ($newFile) {
            if ($file != null) {
                Storage::delete(public_path('jalur/' . $file));
            }
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();

            $filePath = $image->move(public_path('jalur'), $request->nama_jalur . '.' . $extension);
        }

        $data->update([
            'nama_jalur' => $request->nama_jalur,
            'biaya_pendaftaran' => $request->biaya_pendaftaran,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'meta_description' => $request->meta_description,
            'deskripsi' => $request->deskripsi,
            'image' => $request->nama_jalur . '.' . $extension,
            'file_required' => $file_required,
        ]);
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
