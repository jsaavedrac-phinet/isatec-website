<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserRequest extends FormRequest
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
            'name'  => 'required',
            'user'  => 'required|unique:users,user,'.Auth::user()->id,
            'image' => 'max:1024',
        ];
    }

    public function attributes()
    {
        return [
            'name'      => 'Nombre',
            'user'      => 'Usuario',
            'image'     => 'Imagen de Perfil',
            'password'  => 'Clave'
        ];
    }
}
