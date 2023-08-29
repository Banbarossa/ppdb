<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JalurMasukRequest extends FormRequest
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
            'nama_jalur' => 'required',
            'biaya_pendaftaran' => 'required|integer',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date',
            'meta_description' => 'required|max:100',
            'deskripsi' => 'required',
        ];
    }
}
