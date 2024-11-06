<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class InactivityLogout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        // if (Auth::check()) {
        //     // Vérifier si la dernière activité a dépassé le temps limite
        //     if (Session::has('lastActivityTime') && time() - Session::get('lastActivityTime') > (2 * 60)) {
        //         Auth::logout();
        //         Session::forget('lastActivityTime');
        //         Log::info('Utilisateur déconnecté pour inactivité.'); // Vérifie que le middleware est déclenché
        //         Session::flash('message', 'Vous avez été automatiquement déconnecté en raison d\'une inactivité de 300 secondes.');
        //         return redirect()->route('login');

        //     }
        //     Session::put('lastActivityTime', time());
        // }


        // if (Auth::check()) {
        //     $lastActivity = Session::get('last_activity');
        //     if ($lastActivity && (time() - $lastActivity > (60 * 60))) {
        //         Auth::logout();
        //         $request->session()->invalidate();
        //         $request->session()->regenerateToken();
        //         Session::forget('last_activity');
        //         Log::info('Vous avez été automatiquement déconnecté en raison d\'une inactivité de 3600 secondes.');
        //         Session::flash('message', 'Vous avez été automatiquement déconnecté en raison d\'une inactivité de 3600 secondes.');
        //         return redirect()->route('login');
        //     }
        //     Session::put('last_activity', time());
        // }
        return $next($request);
    }
}
