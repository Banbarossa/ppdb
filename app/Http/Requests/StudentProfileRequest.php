<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentProfileRequest extends FormRequest
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
            'nisn' => ['required', 'min:10', 'numeric'],
            'jenis_kelamin' => ['required'],
            'tempat_lahir_siswa' => ['required'],
            'tanggal_lahir_siswa' => ['required', 'date'],
            // 'agama' => ['required'],
            // 'nik_siswa' => ['required', 'digits:16'],
            // 'no_akte' => ['required'],
            // 'cita_cita' => ['required'],
            // 'hobi' => ['required'],
            // 'tinggi_badan' => ['required', 'numeric'],
            // 'berat_badan' => ['required', 'numeric'],
            // 'gol_darah' => ['required'],
            // 'anak_ke' => ['required', 'numeric', 'max:2'],
            // 'jumlah_saudara' => ['required', 'numeric'],
            // 'hubungan_keluarga' => ['required'],
            'status_anak' => ['required'],
            'alamat_siswa' => ['required'],
        ];
    }
}
