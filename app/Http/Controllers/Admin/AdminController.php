<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRegisterRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Admin::all();
        $title = 'Data Administrator';

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $editRoute = route('admin.admin-management.edit', $data->id);
                    $deleteRoute = route('admin.admin-management.destroy', $data->id);
                    return view('components.action-button', compact('editRoute', 'deleteRoute'));
                })
                ->toJson();
        }

        return view('admin.admin-management.index', compact('title'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['route'] = route('admin.admin-management.store');
        $data['method'] = 'post';
        $data['model'] = new Admin();
        $title = "Data Admin";

        return view('admin.admin-management.create', compact('title', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRegisterRequest $request)
    {
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Alert::success('success', 'Data Berhasil ditambahkan');
        return redirect()->route('admin.admin-management.index');
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
        $data['route'] = route('admin.admin-management.update', $id);
        $data['updatePassword'] = route('admin.admin-management.updatePassword', $id);
        $data['method'] = 'put';
        $data['model'] = Admin::findOrFail($id);
        $title = "Data Admin";

        return view('admin.admin-management.create', compact('title', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        Admin::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        Alert::success('success', 'Data Berhasil diubah');
        return redirect()->route('admin.admin-management.index');
    }

    public function updatePassword(Request $request, string $id)
    {
        $model = Admin::findOrFail($id);

        $request->validate([
            'old_password' => ['required'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);
        $check = Hash::check($request->old_password, $model->password);
        if ($check) {
            $model->update([
                'password' => Hash::make($request->password),
            ]);
            Alert::success('success', 'password Berhasil diubah');
            return redirect()->route('admin.admin-management.index');

        }
        Alert::error('error', 'Password Lama tidak Cocok');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Admin::findOrFail($id)->delete();
        Alert::success('success', 'Data Berhasil dihapus');
        return redirect()->route('admin.admin-management.index');

    }
}
