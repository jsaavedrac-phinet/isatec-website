<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVirtualBookRequest extends FormRequest
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
            'author'      => 'required',
            'contents'   => 'required',
            'image'     => 'required|image|max:1024',
            'year'  =>'integer',
            'url' => 'required|mimes:pdf',

        ];
    }

    public function attributes()
    {
        return [
            'title'     => 'Título',
            'url'       => 'Libro Virtual',
            'image'     => 'Imagen',
            'contents'   => 'Contenido',
            'author'    => 'Autor',
            'year'      => 'Año',
            'collection'=> 'Colleción'

        ];
    }
}
