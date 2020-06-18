<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //metodo user usuario que esta conectado
        if(auth()->check() && auth()->user()->rol=='admin')
        return $next($request);

        return redirect('/')->with('status','usted no tiene permiso');
    }
}
