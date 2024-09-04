<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStuntingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'NIK' => 'NIK',
            'NO_KK' => 'required',
            'NAMA_BALITA' => 'required',
            'TGL_LAHIR' => 'required',
            'JENIS_KELAMIN' => 'required',
            'BERAT_BADAN' => 'required',
            'TINGGI_BADAN' => 'required',
            'NAMA_ORANGTUA' => 'required',
            'ALAMAT' => 'required',
            'KECAMATAN_ID' => 'KECAMATAN_ID',
            'KELURAHANDESA_ID' => 'KELURAHANDESA_ID',
            'sumber_data' => 'required',
            // 'tgl_pengukuran' => 'required|date',
            'updated_at' => 'required|date',
        ];
    }
}
