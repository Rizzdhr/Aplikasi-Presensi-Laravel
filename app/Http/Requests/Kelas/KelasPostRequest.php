<?php

namespace App\Http\Requests\Kelas;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class KelasPostRequest extends FormRequest
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
            "tingkat_kelas" => ['required'],
            "jurusan_id" => ['required'],
            "nomor_kelas" => ['required'],
            "guru_id" => [
                'required',
                  // Menambahkan aturan validasi unique untuk field guru_id di dalam tabel kelas
                Rule::unique('kelas', 'guru_id')->where(function ($query) {

                }),
            ],
        ];
    }
}
