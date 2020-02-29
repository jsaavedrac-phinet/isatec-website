<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title'     =>  'required',
            'author'    => 'required',
            'total'     => 'required|integer|min:1',
            'available' => 'integer|min:1|nullable|lte:total'
        ];
    }

    public function attributes()
    {
        return [
            'title'     => 'Título',
            'total'       => 'Cantidad',
            'author'    => 'Autor',
            'available'      => 'disponible',
        ];
    }
}
