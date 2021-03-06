<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditUserRequest extends Request
{
    public function __construct(Route $route)
    {
        $this->route = $route;
    }
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
            'email' => 'required|email|unique:users,email,' . $this->route->getParameter('users'),
            'password' => '',
            'rol' => 'required|in:Administrador,Profesor,AlumnoESO,AlumnoFP,AlumnoBach'
        ];
    }
}

