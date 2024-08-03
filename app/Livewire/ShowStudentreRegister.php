<?php

namespace App\Livewire;

use App\Models\User;
use App\Traits\GolonganDarahTrait;
use Livewire\Component;

class ShowStudentreRegister extends Component
{

    use GolonganDarahTrait;

    public $data;
    public $nama, $nisn, $jenis_kelamin, $tempat_lahir_siswa, $tanggal_lahir_siswa, $status_anak, $alamat_siswa, $nik_siswa, $no_akte, $cita_cita, $tinggi_badan, $berat_badan, $gol_darah, $anak_ke, $jumlah_saudara, $hubungan_keluarga;
    public $nama_ayah, $pekerjaan_ayah, $no_hp_ayah, $nik_ayah, $tempat_lahir_ayah, $tanggal_lahir_ayah, $status_ayah, $pendidikan_ayah, $penghasilan_ayah;
    public $nama_ibu, $pekerjaan_ibu, $no_hp_ibu, $nik_ibu, $tempat_lahir_ibu, $tanggal_lahir_ibu, $status_ibu, $pendidikan_ibu, $penghasilan_ibu;
    public $sekolah_sebelumnya, $npsn_sekolah_sebelumnya;
    public $golongan_darah;
    public $current_step;
    public $user;

    public function mount($data)
    {
        $this->user = User::findOrFail($data->user_id);
        $this->golongan_darah = $this->getGolonganDarah();
        $this->current_step = 1;
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
        $this->nik_siswa = $data->nik_siswa;
        $this->no_akte = $data->no_akte;
        $this->cita_cita = $data->cita_cita;
        $this->tinggi_badan = $data->tinggi_badan;
        $this->berat_badan = $data->berat_badan;
        $this->gol_darah = $data->gol_darah;
        $this->anak_ke = $data->anak_ke;
        $this->jumlah_saudara = $data->jumlah_saudara;

        $this->nik_ayah = $data->nik_ayah;
        $this->tempat_lahir_ayah = $data->tempat_lahir_ayah;
        $this->tanggal_lahir_ayah = $data->tanggal_lahir_ayah;
        $this->status_ayah = $data->status_ayah;
        $this->pendidikan_ayah = $data->pendidikan_ayah;
        $this->penghasilan_ayah = $data->penghasilan_ayah;

        $this->nik_ibu = $data->nik_ibu;
        $this->tempat_lahir_ibu = $data->tempat_lahir_ibu;
        $this->tanggal_lahir_ibu = $data->tanggal_lahir_ibu;
        $this->status_ibu = $data->status_ibu;
        $this->pendidikan_ibu = $data->pendidikan_ibu;
        $this->penghasilan_ibu = $data->penghasilan_ayah;

    }

    public function storeData()
    {

    }

    public function firstStep()
    {
        $this->current_step = 1;
    }

    public function secondStep()
    {
        $this->current_step = 2;
    }

    public function thirdStep()
    {
        $this->current_step = 3;
    }

    public function render()
    {
        return view('livewire.show-studentre-register');
    }
}
