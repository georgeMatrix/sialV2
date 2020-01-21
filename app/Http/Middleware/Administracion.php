<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;

class Administracion
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
        $operadores = "";
        $clientes = "";
        $unidades = "";
        $provedores = "";
        $rutas = "";
        $cartaPorte = "";
        $cuentasPorCobrarV2 = "";
        $usuarios = "";

        if (Str::contains($request->path(), 'clientes')){
            $clientes = "clientes";
        }elseif(Str::contains($request->path(), 'operadores')){
            $operadores = "operadores";
        }elseif(Str::contains($request->path(), 'provedores')){
            $provedores = "provedores";
        }elseif(Str::contains($request->path(), 'unidades')){
            $unidades = "unidades";
        }elseif(Str::contains($request->path(), 'rutas')){
            $rutas = "rutas";
        }elseif(Str::contains($request->path(), 'cartaPorte')){
            $cartaPorte = "cartaPorte";
        }elseif(Str::contains($request->path(), 'cuentasPorCobrarV2')){
            $cuentasPorCobrarV2 = "cuentasPorCobrarV2";
        }elseif(Str::contains($request->path(), 'usuarios')){
            $usuarios = "usuarios";
        }

        //dd($request->path());
        if (auth()->user()->modulo10 != 0){
            return $next($request);
        }else{
            if (auth()->user()->modulo01 != 0 && $clientes == 'clientes'){
                return $next($request);
            }elseif (auth()->user()->modulo01 != 0 && $operadores == 'operadores'){
                return $next($request);
            }elseif (auth()->user()->modulo01 != 0 && $provedores == 'provedores'){
                return $next($request);
            }elseif (auth()->user()->modulo01 != 0 && $unidades == 'unidades'){
                return $next($request);
            }elseif (auth()->user()->modulo02 != 0 && $rutas == 'rutas'){
                return $next($request);
            }elseif (auth()->user()->modulo03 != 0 && $cartaPorte == 'cartaPorte'){
                return $next($request);
            }elseif (auth()->user()->modulo04 != 0 && $cuentasPorCobrarV2 == 'cuentasPorCobrarV2'){
                return $next($request);
            }elseif (auth()->user()->modulo05 != 0 && $usuarios == 'usuarios'){
                return $next($request);
            }
            else{
                return redirect('error');
            }
        }
    }
}
