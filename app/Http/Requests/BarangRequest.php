<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'namaBarang' => 'required|string|min:5|max:80',
            'stok' => 'required|integer|min:1',
            'hargaBarang' => 'required|integer',
            'kategori_id' => 'required',
            'gambar',
        ];
    }
}
