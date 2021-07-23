<?php

namespace App\Http\Requests\Lawyer;

use Illuminate\Foundation\Http\FormRequest;

class LawyerRequest extends FormRequest
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
            'first_name'=>'required|string|min:2|max:150',
            'last_name'=>'required|string|min:2|max:150',
            'email' => 'required|email|unique:lawyers,email',
            'birth'=>'required|date',
            'picture'=> 'nullable|file|image|max:10240'
        ];
    }

    public function attributes()
    {
        return [
            'first_name' => 'Primer Nombre',
            'last_name' => 'Segundo Nombre',
            'email' => 'Correo electronico',
            'birth' => 'Fecha de Nacimiento',
            'picture' => 'Foto de Perfil',
        ];
    }
}
