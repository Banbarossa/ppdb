<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\EmailRegisterUserValidation;
use App\Models\NewStudent;
use App\Models\Tahun;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tahun = Tahun::where('status', 'aktif')->first();
        $data = User::where('tahun_id', $tahun->id)
            ->orderBy('created_at', 'desc')->get();
        $title = 'List Pendaftaran Santri baru';

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $showRoute = route('admin.user-register.show', $data->id);
                    return view('components.action-button', [
                        'showRoute' => $showRoute,
                    ]);
                })
                ->toJson();
        }

        return view('admin.user.index', ['title' => $title, 'data' => $data]);
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

        $data['title'] = 'Detail Pendaftaran';
        $data['user'] = User::with('newStudents.jenjang')->where('id', $id)->first();
        $data['new-student'] = NewStudent::where('user_id', $id)->first();

        // try {
        // } catch (\Exception $e) {
        //     echo "Error: " . $e->getMessage();
        // }

        // $data['user'] = User::with('newStudents')->where('id', $id)->get;
        return view('admin.user.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'approval' => 'required',
            'approval_note' => 'required',
        ]);
        $user = User::findOrFail($id);
        $user->update($validatedData);

        dispatch(new EmailRegisterUserValidation($user));

        // Mail::to($user->email)->send(new RegisterUserValidation($user));
        Alert::success('Success', 'Data Berhasil diubah');
        return redirect()->route('admin.user-register.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
