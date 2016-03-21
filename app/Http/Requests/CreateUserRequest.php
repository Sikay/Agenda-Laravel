<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateUserRequest extends Request
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
            'firstName' => 'required|between:2,25|regex:/^[A-Za-z0-9 ]+$/',
            'lastName' => 'required|between:2,100|regex:/^[A-Za-z0-9 ]+$/',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|between:6,20|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\d).+$/',
            'rol' => 'required|in:Administrador,Profesor,AlumnoESO,AlumnoFP,AlumnoBach'
        ];
    }
}
