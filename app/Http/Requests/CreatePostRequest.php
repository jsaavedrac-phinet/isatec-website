<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'name'      => 'required',
            'content'   => 'required',
            'image'     => 'required|image|max:1024',
            'date' => 'required',

        ];
    }

    public function attributes()
    {
        return [
            'title'     => 'Título',
            'date'  => 'Fecha',
            'image'     => 'Imagen',
            'content'   => 'Contenido'
        ];
    }
}
