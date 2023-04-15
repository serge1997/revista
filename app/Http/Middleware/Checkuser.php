<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Checkuser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

       try{

            if (Auth::user()->admin == false){
                return redirect()->route("profil.user");
            }

       }catch(\Exception $e){

        return redirect()->route('login');

       }

        return $next($request);
    }
}
