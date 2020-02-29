<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'title'     =>  'required',
            'name'      => 'required',
            'content'   => 'required',
            'image'     => 'image|max:1024',
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
