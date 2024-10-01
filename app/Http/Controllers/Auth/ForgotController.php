<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ForgotController extends Controller
{
    public function showForgotForm() {
        return view('auth.password.forgotPassword');
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'email_or_phone' => 'required', // Assure-toi que l'utilisateur entre quelque chose
        ]);

        // Vérifie si l'entrée est un email ou un numéro de téléphone
        $identifier = $request->input('email_or_phone');

        // Détermine si l'utilisateur a saisi un email ou un numéro de téléphone
        if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
            // C'est un email
            $user = User::where('email', $identifier)->first();
        } else {
            // C'est un numéro de téléphone
            $user = User::where('phone', $identifier)->first();
        }

        if (!$user) {
            return back()->withErrors(['email_or_phone' => 'Utilisateur non trouvé.']);
        }

        // Générer un OTP
        $otp = rand(123456, 999999);

        // Stocker OTP dans la table `password_reset_token`
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $user->email],
            [
                'otp' => $otp,
                'token' => Str::random(60),
                'created_at' => now()
            ]
        );

        // Passer soit l'email soit le téléphone dans la session
        if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
            session(['identifier' => $user->email]);
        } else {
            session(['identifier' => $user->phone]);
        }

        // Redirection vers la page de vérification OTP
        return redirect()->route('forgotpassword.otpverify')->with('identifier', session('identifier'));
    }


    public function showOtpVerifyForm() {
        return view('auth.password.otpverify');
    }

    public function verifyOtp(Request $request) {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $identifier = session('identifier');

        $otp_record = DB::table('password_reset_tokens')
                        ->where(function($query) use ($identifier) {
                            $query->where('email', $identifier)
                                ->orWhere('phone', $identifier);
                        })
                        ->first();

        // if (!$otp_record || $otp_record->otp != $request->input('otp')) {
        //     return back()->withErrors(['otp' => 'Code OTP incorrect.']);
        // }

        if ($otp_record->email) {
            session(['email' => $otp_record->email]);
        } else {
            // Si tu stockes des numéros de téléphone, tu pourrais vouloir mettre à jour cela
            session(['phone' => $otp_record->phone]);
        }
        
        // Rediriger vers le formulaire de réinitialisation de mot de passe
        return redirect()->route('forgotpassword.resetpassword');
    }

    public function showResetPasswordForm() {
        return view('auth.password.resetpassword');
    }

    

    public function resetPassword(Request $request) {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

         // Vérifie si l'utilisateur a fourni un email ou un téléphone
        // if (session('email')) {
        //     $user = User::where('email', session('email'))->first();
        // } else {
        //     $user = User::where('phone', session('phone'))->first();
        // }

        // Vérifie si l'utilisateur a fourni un email ou un téléphone
        $identifier = session('verified_identifier');
        $user = User::where('email', $identifier)
                    ->orWhere('phone', $identifier)
                    ->first();

        // if (!$user) {
        //     return back()->withErrors(['error' => 'Utilisateur non trouvé']);
        // }
        // Met à jour le mot de passe de l'utilisateur
        $user->password = Hash::make($request->password);
        $user->save();

        // Supprime les informations de réinitialisation de la base de données
        DB::table('password_reset_tokens')->where('email', $identifier)
        ->orWhere('phone', $identifier)->delete();

        return redirect('/home')->with('status', 'Mot de passe changé avec succès !');
    }
}
