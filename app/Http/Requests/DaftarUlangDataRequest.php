<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DaftarUlangDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'agama' => 'required',
            'nik' => 'required|min:16|max:16',
            'nik_siswa' => 'required|min:16|max:16',
            'no_akte' => 'required',
            'cita_cita' => 'required',
            'hobi' => 'required',
            'tinggi_badan' => 'required',
            'berat_badan' => 'required',
            'gol_darah' => 'required',
            'anak_ke' => 'required',
            'jumlah_saudara' => 'required',
            'hubungan_keluarga' => 'required',

            // ayah
            'nik_ayah' => 'required|min:16|max:16',
            'tempat_lahir_ayah' => 'required',
            'tanggal_lahir_ayah' => 'required',
            'status_ayah' => 'required',
            'pendidikan_ayah' => 'required',
            'penghasilan_ayah' => 'required',

            // ibu
            'nik_ibu' => 'required|min:16|max:16',
            'tempat_lahir_ibu' => 'required',
            'tanggal_lahir_ibu' => 'required',
            'status_ibu' => 'required',
            'pendidikan_ibu' => 'required',
            'penghasilan_ibu' => 'required',
            'alamat_orang_tua' => 'required',

            // wali
            'nik_wali' => 'required|min:16|max:16',
            'pendidikan_wali' => 'required',
            'penghasilan_wali' => 'required',
            'no_hp_wali' => 'required',
        ];
    }
}
