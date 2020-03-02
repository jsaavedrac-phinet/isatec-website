<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePreRegisterRequest extends FormRequest
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
            'name'                      =>  'required|max:80',
            'lastname'                  =>  'required|max:80',
            'mothers_lastname'          =>  'required|max:80',
            'email'                     =>  'required|email|max:255',
            'type_phone'                =>  'required|max:20',
            'phone'                     =>  'required|max:20',
            'sex'                       =>  'required|max:255',
            'turn_id'                   =>  'required|integer',
            'program_id'                =>  'required|integer',
            'type_identification'       =>  'required|integer',
            'identification_number'     =>  'required|integer',
            'pre_registration'          =>  'accepted',
        ];
    }

    public function attributes()
    {
        return [
            'name'                      =>  'Nombre',
            'lastname'                  =>  'Apellido Paterno',
            'mothers_lastname'          =>  'Apellido Materno',
            'email'                     =>  'Email',
            'type_phone'                =>  'Tipo de teléfono',
            'phone'                     =>  'Teléfono',
            'sex'                       =>  'Sexo',
            'turn_id'                   =>  'Turno',
            'program_id'                =>  'Programa Académico',
            'type_identification'       =>  'Tipo de Identificación',
            'identification_number'     =>  'Número de Identificación',
        ];
    }

    protected function prepareForValidation()
    {

        if( $this->request->get('identification_number') != '' && $this->request->get('program_id')!= '' ){

            $codeprogram = $this->request->get('identification_number').'-'.$this->request->get('program_id');
            $student =\App\Student::where('codeprogram',$codeprogram)->first();
            $pre_reg = 1;
            if($student != null){
                if(\App\PreRegistration::where('cycle_id',$this->request->get('cycle_id'))->where('student_id',$student->id)->first() != null){
                    $pre_reg=0;
                }
                $student = $student->id;
            }
             $sanitize = $this->all();
                $sanitize['code'] = $this->request->get('identification_number');
                $sanitize['codeprogram'] = $this->request->get('identification_number').'-'.strtolower(explode("xx",$this->request->get('program_id'))[0]);
                $sanitize['curricular_plan_id'] = explode("xx",$this->request->get('program_id'))[1];
                $sanitize['program_id'] =explode("xx",$this->request->get('program_id'))[0];
                $sanitize['pre_registration'] = $pre_reg;



                $this->getInputSource()->replace($sanitize);
        }

    }

    public function messages()
    {
        return [
            'pre_registration.accepted' => 'Ya te encuentras preregistrado para esta carrera.'
        ];
    }

}
