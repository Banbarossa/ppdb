<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailQueueJob;
use App\Models\JalurMasuk;
use App\Models\Jenjang;
use App\Models\NewStudent;
use App\Models\Tahun;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class RegisteredUserController extends Controller
{

    /**
     * Display the registration view.
     */
    public function create($id): View
    {
        $jenjang = Jenjang::all();
        $jalurMasuk = JalurMasuk::findOrFail($id);
        return view('auth_user.register', compact('jalurMasuk', 'jenjang'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    { //: RedirectResponse {

        $jalur_masuk = JalurMasuk::findOrFail($request->id)->nama_jalur;
        $biaya_pendaftaran = JalurMasuk::findOrFail($request->id)->biaya_pendaftaran;
        $tahun_id = Tahun::where('status', 'aktif')->first();
        $jumlah_user = User::all()->count();
        $no_pendaftaran = substr($tahun_id->tahun, -4) . '-' . str_pad($jumlah_user + 1, 3, '0', STR_PAD_LEFT);

        // validasi
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'no_hp' => ['required', 'min:11', 'max:17'],
            'jenjang' => ['required'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'resi' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        // defrag no hp
        $no_hp = str_replace([' ', '-'], '', $request->no_hp);

        // store file
        $file = $request->file('resi');
        $filename = $file->hashName();

        $path = $file->storeAs('resiPendaftaran', $filename);

        // stora data to User Table
        $user = User::create([
            'name' => $request->name,
            'tahun_id' => $tahun_id->id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'resi' => $filename,
            'nama_jalur' => $jalur_masuk,
            'biaya_pendaftaran' => $biaya_pendaftaran,
            'approval' => 'pending',
            'approval_note' => '',
            'level_pendaftaran' => 1,
        ]);

        // stora data to new student Table
        $newStudent = NewStudent::create([

            'user_id' => $user->id,
            'nama' => $request->name,
            'no_pendaftaran' => $no_pendaftaran,
            'tahun_id' => $tahun_id->id,
            'no_hp' => $no_hp,
            'jenjang' => $request->jenjang,
            'jalur_masuk' => $jalur_masuk,
            'biaya_pendaftaran' => $biaya_pendaftaran,
        ]);

        event(new Registered($user));

        dispatch(new SendEmailQueueJob('banbarossa@gmail.com', $user));
        // Mail::to('banbarossa@gmail.com')->send(new UserRegisterEmail($user));

        // sweat alert
        Alert::success('Pendaftaran Berhasil', 'Terima Kasih sudah mendaftar, konfirmasi pendaftaran kepanitia untuk mengaktifkan akun. jika sudah disetujui silahkan login untuk melengkapi pendaftaran');

        return redirect()->route('psb.login');

    }
}
