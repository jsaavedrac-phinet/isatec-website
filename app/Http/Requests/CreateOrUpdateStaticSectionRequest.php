<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrUpdateStaticSectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        $image_rules = 'image|max:1024';

        if($this->request->get('operation') == 'create' && $this->request->get('show_image') == true){
            $image_rules .='|required';
        }
        return [
            'image'     => $image_rules,
            'content'   => 'required',
            'title'     =>  'required'
        ];
    }

    public function attributes()
    {
        return [
            'image'     => 'Imagen',
            'content'   => 'Contenido',
            'title'     => 'Título',
            'subtitle'  => 'Subtítulo'
        ];
    }
}
