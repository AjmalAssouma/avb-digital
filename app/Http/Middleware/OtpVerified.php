<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class OtpVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifier si l'OTP a été vérifié dans la session
        if (!session()->has('otp_verified') || !session('otp_verified')) {
            return redirect()->route('otp.verify')->with('error', 'Vous devez d\'abord vérifier votre code OTP.');
        }
        return $next($request);
    }
}
