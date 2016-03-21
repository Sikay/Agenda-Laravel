<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateContactoRequest extends Request
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
            'user_id' => 'required|exists:contactos,user_id',
            'firstName' => 'required|between:2,25|regex:/^[A-Za-z0-9 ]+$/',
            'lastName' => 'required|between:2,100|regex:/^[A-Za-z0-9 ]+$/',
            'email' => 'required|email|unique:contactos,email,null,id,user_id,' . \Auth::id(),
            'telefono' => 'required|regex:/^[0-9 +]{9,13}+$/',
            'direccion' => 'required|between:2,250|regex:/^[A-Za-z0-9 ,\º]+$/',
            'categoria' => 'required|in:Amigo,Familia,Favoritos'
        ];
    }
}
