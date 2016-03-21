<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Session;

class IsAdmin
{
    private $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( ! $this->auth->user()->isAdmin()) 
        {
            if ($request->ajax() || $request->wantsJson()) 
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                $message = 'No tienes permisos de Administrador para entrar en esta pagina';
                Session::flash('message', $message);
                return redirect()->to('/home');
            }

        }
        return $next($request);
    }

}
