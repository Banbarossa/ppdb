<?php

namespace App\Livewire;

use App\Models\NewStudent;
use App\Models\User;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class DaftarWizard extends Component
{
    public $current_step;
    public $nama, $nisn, $jenis_kelamin, $tempat_lahir_siswa, $tanggal_lahir_siswa, $status_anak, $alamat_siswa;
    public $nama_ayah, $pekerjaan_ayah, $no_hp_ayah, $nama_ibu, $pekerjaan_ibu, $no_hp_ibu;
    public $sekolah_sebelumnya, $npsn_sekolah_sebelumnya;

    public function mount()
    {
        $this->current_step = 1;
        $data = NewStudent::where('user_id', auth()->user()->id)->first();
        $this->nama = $data->nama;
        $this->nisn = $data->nisn;
        $this->jenis_kelamin = $data->jenis_kelamin;
        $this->tempat_lahir_siswa = $data->tempat_lahir_siswa;
        $this->tanggal_lahir_siswa = $data->tanggal_lahir_siswa;
        $this->status_anak = $data->status_anak;
        $this->alamat_siswa = $data->alamat_siswa;
        $this->nama_ayah = $data->nama_ayah;
        $this->pekerjaan_ayah = $data->pekerjaan_ayah;
        $this->no_hp_ayah = $data->no_hp_ayah;
        $this->nama_ibu = $data->nama_ibu;
        $this->pekerjaan_ibu = $data->pekerjaan_ibu;
        $this->no_hp_ibu = $data->no_hp_ibu;
        $this->sekolah_sebelumnya = $data->sekolah_sebelumnya;
        $this->npsn_sekolah_sebelumnya = $data->npsn_sekolah_sebelumnya;

    }

    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'nisn' => 'required|min:10|numeric',
            'jenis_kelamin' => 'required',
            'tempat_lahir_siswa' => 'required',
            'tanggal_lahir_siswa' => 'required|date',
            'status_anak' => 'required',
            'alamat_siswa' => 'required',

        ]);

        $this->current_step = 2;
    }

    public function secondStepSubmit()
    {

        $validatedData = $this->validate([
            'nama_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            // 'no_hp_ayah' => 'required',
            'nama_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'no_hp_ibu' => 'required',
        ]);
        $this->current_step = 3;

    }

    public function storeData()
    {
        $validatedData = $this->validate([
            'sekolah_sebelumnya' => 'required',
            'npsn_sekolah_sebelumnya' => 'required|min:8',
        ]);

        $update = NewStudent::where('user_id', auth()->user()->id)->update([
            'nisn' => $this->nisn,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tempat_lahir_siswa' => $this->tempat_lahir_siswa,
            'tanggal_lahir_siswa' => $this->tanggal_lahir_siswa,
            'status_anak' => $this->status_anak,
            'alamat_siswa' => $this->alamat_siswa,
            'nama_ayah' => $this->nama_ayah,
            'pekerjaan_ayah' => $this->pekerjaan_ayah,
            'no_hp_ayah' => $this->no_hp_ayah,
            'nama_ibu' => $this->nama_ibu,
            'pekerjaan_ibu' => $this->pekerjaan_ibu,
            'no_hp_ibu' => $this->no_hp_ibu,
            'sekolah_sebelumnya' => $this->sekolah_sebelumnya,
            'npsn_sekolah_sebelumnya' => $this->npsn_sekolah_sebelumnya,
        ]);

        $user = User::findOrFail(auth()->user()->id);
        if ($user->level_pendaftaran < 4) {
            $user->level_pendaftaran = 4;
            $user->save();
        }

        Alert::success('success', 'Data Berhasil ditambahakan');
        return redirect()->route('psb.dashboard');

    }

    public function decreaseStep()
    {
        $this->current_step--;
    }

    public function render()
    {
        return view('livewire.daftar-wizard');
    }

}
