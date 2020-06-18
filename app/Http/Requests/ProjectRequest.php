<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    
    public function authorize()
    {
        //true para que cualquier usuario pueda crear un proyecto
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    //reglas de validacion de contacto
    public function rules()
    {
        return [
            'name'=>'required',
                'modality'=>'required|in:individual,conjunto,parejas',
                'description'=>'required',
        ];
    }

    //modificar los mesajes de error
    public function messages()
    {
        return [
            '*.required'=>'El campo es requerido',
        ];
    }
}
