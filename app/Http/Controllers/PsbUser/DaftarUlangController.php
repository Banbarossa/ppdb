<?php

namespace App\Http\Controllers\PsbUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\DaftarUlangDataRequest;
use App\Models\Berkaspsb;
use App\Models\NewStudent;
use App\Models\User;
use App\Traits\AgamaTrait;
use App\Traits\GolonganDarahTrait;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DaftarUlangController extends Controller
{
    use AgamaTrait;
    use GolonganDarahTrait;

    public function index()
    {

        $data['siswa'] = NewStudent::where('user_id', auth()->user()->id)->first();
        $data['agama'] = $this->getAgama();
        $data['golongan_darah'] = $this->getGolonganDarah();
        return view('psb-user.daftar-ulang-data', compact('data'));
    }

    public function storeData(DaftarUlangDataRequest $request)
    {
        //DaftarUlangDataRequest

        if (auth()->user()->level_pendaftaran == 5) {
            $data = NewStudent::where('user_id', auth()->user()->id)->first();
            $data->update([
                'agama' => $request->agama,
                'nik' => $request->nik,
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

                // ayah
                'nik_ayah' => $request->nik_ayah,
                'tempat_lahir_ayah' => $request->tempat_lahir_ayah,
                'tanggal_lahir_ayah' => $request->tanggal_lahir_ayah,
                'status_ayah' => $request->status_ayah,
                'pendidikan_ayah' => $request->pendidikan_ayah,
                'penghasilan_ayah' => $request->penghasilan_ayah,

                // ayah
                'nik_ibu' => $request->nik_ibu,
                'tempat_lahir_ibu' => $request->tempat_lahir_ibu,
                'tanggal_lahir_ibu' => $request->tanggal_lahir_ibu,
                'status_ibu' => $request->status_ibu,
                'pendidikan_ibu' => $request->pendidikan_ibu,
                'penghasilan_ibu' => $request->penghasilan_ibu,
                'alamat_orang_tua' => $request->alamat_orang_tua,

                // wali
                'nama_wali' => $request->nama_wali,
                'nik_wali' => $request->nik_wali,
                'status_wali' => $request->status_wali,
                'pendidikan_wali' => $request->pendidikan_wali,
                'penghasilan_wali' => $request->penghasilan_wali,
                'no_hp_wali' => $request->no_hp_wali,

            ]);

            User::findOrFail(auth()->user()->id)->update([
                'level_pendaftaran' => 6,
            ]);

            Alert::success('Success', 'Data Berhasil ditambhakan');
            return redirect()->route('psb.dashboard');
        }

        Alert::info('Warning', 'Anda tidak memiliki Akses untuk merubah dan mengganti data');
        return redirect()->route('psb.upload-berkas.index');

    }

    public function berkas()
    {
        if (auth()->user()->level_pendaftaran == 6) {
            $data = NewStudent::where('user_id', auth()->user()->id)->first();
            return view('psb-user.upload-berkas', compact('data'));
        } elseif (auth()->user()->level_pendaftaran > 6) {
            $data = NewStudent::with('berkasPsb')->where('user_id', auth()->user()->id)->first();
            return view('psb-user.show-berkas', compact('data'));
        } else {
            Alert::info('Perhatian', 'Silahkan lengkapi data sebelumnya');
            return redirect()->route('psb.daftar-ulang.index');
        }

    }

    public function berkasStore(Request $request)
    {

        $validatedData = $request->validate([
            'kk' => ['required', 'file', 'mimes:pdf', 'max:1024'],
            'akte_lahir' => ['required', 'file', 'mimes:pdf', 'max:1024'],
            'ktp_wali' => ['required', 'file', 'mimes:pdf', 'max:1024'],
            'surat_aktif_sekolah' => ['required', 'file', 'mimes:pdf', 'max:1024'],

        ]);
        $siswa = NewStudent::where('user_id', auth()->user()->id)->first();

        if ($siswa->status_anak == "Yatim") {
            $validatedData = $request->validate([
                'surat_kematian_ayah' => ['required', 'file', 'mimes:pdf', 'max:1024'],
                'akte_kematian_ayah' => ['required', 'file', 'mimes:pdf', 'max:1024'],
            ]);
        }

        $data = Berkaspsb::updateOrCreate(
            ['new_student_id' => $siswa->id],

        );
        foreach ($request->allFiles() as $fieldName => $file) {
            if ($file->isValid()) {
                $fileName = $siswa->nisn . "_" . $fieldName . "_" . $file->hashName();
                $file->storeAs('berkas', $fileName);
                $data->$fieldName = $fileName;
            }
        }

        $data->save();

        User::findOrFail(auth()->user()->id)->update([
            'level_pendaftaran' => 7,
        ]);

        Alert::success('success', 'Data berhasil ditambahkan');
        return redirect()->route('psb.dashboard');
    }

    public function unduhFormulir()
    {
        Auth::loginUsingId(3);
        $data = NewStudent::where('user_id', auth()->user()->id)->first();
        $pdf = Pdf::loadView('psb-user.unduh-formulir', ['data' => $data]);
        $pdf->setPaper('A4', 'potrait');
        // return $pdf->stream();
        return $pdf->download('Formulir.pdf');
        // return view('psb-user.unduh-formulir', ['data' => $data]);
    }

}
