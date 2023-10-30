<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'nim' => 'required|unique:student',
            'nama_siswa' => 'required',
            'tahun_angkatan' => 'required',
            'fakultas' => 'required',
            'jurusan' => 'required',
            'kelas' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'nim.required' => 'NIM tidak boleh kosong!',
            'nim.unique' => 'NIM mahasiswa sudah terdaftar!',

            'nama_siswa.required' => 'Nama mahasiswa tidak boleh kosong!',
            'tahun_angkatan.required' => 'Tahun angkatan tidak boleh kosong!',
            'fakultas.required' => 'Fakultas tidak boleh kosong!',
            'jurusan.required' => 'Jurusan tidak boleh kosong!',
            'kelas.required' => 'Kelas tidak boleh kosong!'
        ];
    }
}
