<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSectionRequest extends FormRequest
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
        $image_rules = 'image|max:1024';

        if($this->request->get('show_image') == true){
            $image_rules .='|required';
        }
        return [
            'image' => $image_rules,
            'content'=> 'required'
        ];
    }

    public function attributes()
    {
        return [
            'image'     => 'Imagen',
            'content'   => 'Contenido'
        ];
    }
}
