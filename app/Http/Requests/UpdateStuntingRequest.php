<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStuntingRequest extends FormRequest
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
            
            'NAMA_BALITA' => 'required',
            'sumber_data' => 'required', // Validasi untuk sumber_data
            'updated_at' => 'required|date', // Validasi untuk tgl_pengukuran
            // 'tgl_pengukuran' => 'required|date', // Validasi untuk tgl_pengukuran
        ];
    }
}
