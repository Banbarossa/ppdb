<?php

namespace App\Http\Controllers\PsbUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentProfileRequest;
use App\Models\NewStudent;
use App\Models\User;
use App\Traits\AgamaTrait;
use App\Traits\GolonganDarahTrait;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    use AgamaTrait;
    use GolonganDarahTrait;

    public function index()
    {
        $data['siswa'] = NewStudent::where('user_id', auth()->user()->id)->first();
        $data['agama'] = $this->getAgama();
        $data['golongan_darah'] = $this->getGolonganDarah();
        return view('psb-user.profile-create', compact('data'));
    }

    public function store(StudentProfileRequest $request)
    {

        $user = User::findOrFail(auth()->user()->id);

        NewStudent::where('user_id', $user->id)->update([
            'nisn' => $request->nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir_siswa' => $request->tempat_lahir_siswa,
            'tanggal_lahir_siswa' => $request->tanggal_lahir_siswa,
            'agama' => $request->agama,
            'nik_siswa' => $request->nik_siswa,
            'no_akte' => $request->no_akte,
            'cita_cita' => $request->cita_cita,
            'hobi' => $request->hobi,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'gol_darah' => $request->gol_darah,
            'anak_ke' => $request->anak_ke,
            'jumlah_saudara' => $request->jumlah_saudara,
            'hubungan_keluarga' => $request->hubungan_keluarga,
            'status_anak' => $request->status_anak,
            'alamat_siswa' => $request->alamat_siswa,

        ]);

        if ($user->level_pendaftaran < 2) {
            $user->level_pendaftaran = 2;
            $user->save();
        }

        Alert::success('Success', 'Data Berhasil disimpan');
        return redirect()->route('psb.dashboard');
    }

    public function waliCreate()
    {
        if (auth()->user()->level_pendaftaran < 2) {
            Alert::warning('Warning', 'Silahkan langkah sebelumnya terlebih dahulu');
            return redirect()->route('psb.dashboard');
        }
        $data['siswa'] = NewStudent::where('user_id', auth()->user()->id)->first();
        return view('psb-user.wali-create', compact('data'));
    }

    public function waliStore(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);

        $request->validate([
            'nama_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            // no_hp_ayah
            'nama_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            // no_hp_ibu

        ]);

        NewStudent::where('user_id', $user->id)->update([
            'nama_ayah' => $request->nama_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'no_hp_ayah' => $request->no_hp_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'no_hp_ibu' => $request->no_hp_ibu,
        ]);

        if ($user->level_pendaftaran < 3) {
            $user->level_pendaftaran = 3;
            $user->save();
        }

        Alert::success('Success', 'Data Berhasil disimpan');
        return redirect()->route('psb.dashboard');

    }

    public function sekolahCreate()
    {
        if (auth()->user()->level_pendaftaran < 3) {
            Alert::warning('Warning', 'Silahkan langkah sebelumnya terlebih dahulu');
            return redirect()->route('psb.dashboard');
        }
        $data['siswa'] = NewStudent::where('user_id', auth()->user()->id)->first();
        return view('psb-user.sekolah-create', compact('data'));
    }

    public function sekolahStore(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);

        $validatedData = $request->validate([
            'sekolah_sebelumnya' => 'required',
            'npsn_sekolah_sebelumnya' => 'required|numeric|digits:8',
        ]);

        NewStudent::where('user_id', $user->id)->update($validatedData);

        if ($user->level_pendaftaran < 4) {
            $user->level_pendaftaran = 4;
            $user->save();
        }
        Alert::success('Success', 'Data Berhasil disimpan');
        return redirect()->route('psb.dashboard');

    }
}
