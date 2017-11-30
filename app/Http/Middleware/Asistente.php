<?php

namespace tpi\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;

use Closure;
use Session;

class Asistente
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

 protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth=$auth;
    }

    public function handle($request, Closure $next)
    {
        switch($this->auth->user()->idrol)
        {
            case "1":
            #administrador
            return redirect()->to('administrador'); 
            break;

            case "2":
            #asistente
            //return redirect()to('asistente');
            break;

            case "3":
            #docente
            return redirect()->to('docente');
            break;

            default:
            return redirect()->to('login');

      }


       // return $next($request);
    }
}
