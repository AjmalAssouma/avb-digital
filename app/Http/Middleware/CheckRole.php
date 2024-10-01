<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = Auth::user();

        // Vérifie si l'utilisateur est authentifié et possède le rôle requis
        // if ($user && $user->role->habilitation === $role) {
        //     return $next($request); // Autorise l'accès à la route
        // }

        if (Auth::check() && $user->idRole == $role) {
            return $next($request); // Autorise l'accès à la route
        }
        // Redirige l'utilisateur vers une page d'erreur ou d'accueil
        return redirect()->route('home')->with('error', 'Accès non autorisé.');
    }
}
