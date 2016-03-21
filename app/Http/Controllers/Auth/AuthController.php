<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function store(RegisterUserRequest $request)
    {
        $user = User::create($request->all());

        $message = 'Enhorabuena, te has registrado correctamente';
        Session::flash('message', $message);

        return redirect()->to('/login');
    }
}
