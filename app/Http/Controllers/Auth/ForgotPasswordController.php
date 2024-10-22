<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\PasswordResetToken;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class ForgotPasswordController extends Controller
{

    public function sendSMS($to, $content)
    {
        // Replace the following values with your own
        $prodUrl = 'https://apis.letexto.com';
        $token = '189e8e03a8a7c98d03ecb071ea8cb35d';
        $from = 'AAVIE';
        // $to = '2250000000000';
        // $content = 'Hello API!';
        $dlrUrl = 'https://lafricaineviebenin.com:4444/dlr';
        $customData = 'LeSensDeLEngagement';
        $sendAt = date('Y-m-d H:i:s');

        $headers = [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json'
        ];

        $url = $prodUrl . '/v1/messages/send?from=' . urlencode($from) .
            '&to=' . $to .
            '&content=' . urlencode($content) .
            '&token=' . $token .
            '&dlrUrl=' . urlencode($dlrUrl) .
            '&dlrMethod=GET&customData=' . $customData .
            '&sendAt=' . urlencode($sendAt);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Désactiver la vérification SSL (à ne pas faire en production)
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $response = curl_exec($ch);

        // if($response === false)
        // {
        //     echo 'Curl error: ' . curl_error($ch);
        // }
        // else
        // {
        //     echo $response;
        // }

        // curl_close($ch);

        // Vérification des erreurs
        if ($response === false) {
            $error = curl_error($ch);
            Log::error('Curl error: ' . $error);  // Enregistrement de l'erreur dans les logs Laravel
            curl_close($ch);
            return ['status' => 'error', 'message' => 'Curl error: ' . $error];
        }

        // Fermeture de la session cURL
        curl_close($ch);

        // Traitement de la réponse
        return ['status' => 'success', 'response' => $response];
    }
    
    public function notif($email, $otp)
    {
        $message = "<p style='color:#080;font-size:18px;'>Votre code de vérification est : $otp</p>";

        Mail::html($message, function ($m) use ($email) {
            $m->to($email)
            ->subject('CODE DE CONNEXION A VOTRE COMPTE AAVIE');
        });
    }


    // Affiche le formulaire pour entrer l'email ou le numéro de téléphone
    public function showForgotPasswordForm()
    {
        return view('auth.forgotpassword');
    }

    public function submitForgotPasswordForm(Request $request)
    {
        $request->validate([
            'identifier' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL) && !preg_match('/^\d+$/', $value)) {
                        $fail('L\'identifiant doit être une adresse email valide ou un numéro de téléphone.');
                    }
                },
            ],
        ], [
            'identifier.required' => 'Veuillez entrer votre email ou numéro de téléphone.',
        ]);

        $identifier = $request->identifier;
        $isEmail = filter_var($identifier, FILTER_VALIDATE_EMAIL);

        // Gestion du préfixe pour les numéros de téléphone
        $identifierWithPrefix = $isEmail ? $identifier : (Str::startsWith($identifier, '229') ? $identifier : '229' . $identifier);

        // Vérification de l'utilisateur
        $user = $isEmail
            ? User::where('email', $identifierWithPrefix)->first()
            : User::where('phone', $identifierWithPrefix)->first();

        if (!$user) {
            return back()->withErrors([
                'identifier' => $isEmail ? 'L\'adresse mail est incorrecte.' : 'Le numéro de téléphone est incorrect.',
            ])->withInput();
        }

        // Génération d'un OTP sécurisé
        // $otp = random_int(100000, 999999);
        $otp = 123456;

        // Insertion ou mise à jour dans la table password_reset_tokens
        PasswordResetToken::updateOrInsert(
            [
                'email' => $user->email,
            ],
            [
                'phone' => !$isEmail ? $user->phone : null,
                'otp' => $otp,
                'token' => Str::random(64),
                'created_at' => now(),
            ]
        );

        // Envoi de l'OTP
        if ($isEmail) {
            $this->notif($user->email, $otp);
        } else {
            $smsContent = "Votre code de vérification est : " . $otp;
            $this->sendSMS($identifierWithPrefix, $smsContent);
        }
        
        session(['reset_identifier' => $identifierWithPrefix]);

        // Redirection vers la page de vérification de l'OTP
        return redirect()->route('otp.verify');
    }

    

    // Affiche le formulaire de vérification de l'OTP-------------------------------------------
    public function showOtpVerifyForm()
    {
         // Vérifiez si l'identifiant est dans la session
        if (!session()->has('reset_identifier')) {
            return redirect()->route('forgot.password')->withErrors(['message' => 'Veuillez d\'abord entrer vos identifiants.']);
        }
        return view('auth.otpverify');

    }


    // -------------------------------------------------------------------------------------------

    public function submitOtpVerifyForm(Request $request)
    {
        $request->validate([
            'otp1' => 'required|digits:1',
            'otp2' => 'required|digits:1',
            'otp3' => 'required|digits:1',
            'otp4' => 'required|digits:1',
            'otp5' => 'required|digits:1',
            'otp6' => 'required|digits:1',
        ], [
            'otp1.required' => 'Veuillez entrer le code OTP.',
            // messages d'erreur personnalisés pour chaque champ si nécessaire
        ]);

        $otp = $request->otp1 . $request->otp2 . $request->otp3 . $request->otp4 . $request->otp5 . $request->otp6;

        $identifier = session('reset_identifier');

        // Vérifiez si c'est un email ou un téléphone pour récupérer le bon utilisateur
        $isEmail = filter_var($identifier, FILTER_VALIDATE_EMAIL);
        $user = $isEmail
            ? User::where('email', $identifier)->first()
            : User::where('phone', $identifier)->first();

        if (!$user) {
            return back()->withErrors(['otp' => 'Utilisateur non trouvé.']);
        }

        // Vérifiez si l'OTP est correct dans la table `password_reset_tokens`
        $otpRecord = DB::table('password_reset_tokens')
            ->where('email', $user->email)
            ->where('otp', $otp)
            ->first();

        if ($otpRecord) {         
              // Marquer l'OTP comme vérifié
            session(['otp_verified' => true]);   
            // Redirection vers la page de réinitialisation de mot de passe

            return redirect()->route('password.reset');
        }else{
            // Si l'OTP est incorrect, retourner à la page de vérification de l'OTP avec un message d'erreur
            return redirect()->back()->withErrors(['otp' => 'Le code de vérification est incorrect.']);
        }

    }


// -----------------------------------------------------------------------------------------------------------------------

    public function resendOtp(Request $request)
    {
        $identifier = $request->identifier;

        $isEmail = filter_var($identifier, FILTER_VALIDATE_EMAIL);
        $user = $isEmail
            ? User::where('email', $identifier)->first()
            : User::where('phone', $identifier)->first();

        if (!$user) {
            // return response()->json(['success' => false, 'message' => 'Utilisateur non trouvé.']);
            return back()->withErrors(['message' => 'Utilisateur non trouvé.']);

        }

        // Générer un nouvel OTP
        $otp = random_int(100000, 999999);

        // Mettre à jour l'OTP dans la table `password_reset_tokens`
        PasswordResetToken::updateOrInsert(
            [
                'email' => $user->email,
            ],
            [
                'phone' => !$isEmail ? $user->phone : null,
                'otp' => $otp,
                'token' => Str::random(64),
                'created_at' => now(),
            ]
        );

         // Envoi de l'OTP
        if ($isEmail) {
            $this->notif($user->email, $otp);
            return redirect()->back()->with('success', 'Un nouveau code de verification a été renvoyé par email.');
        } elseif($identifier) {
            $this->sendSMS($identifier, "Votre code de vérification est : $otp");
            return redirect()->back()->with('success', 'Un nouveau code de verification a été renvoyé par SMS.');
        }

        // Redirection avec un message de succès
        // return back()->with('success', 'Code de vérification renvoyé avec succès.');
    }


// -------------------------------------------------------------------------


    // Affiche le formulaire de réinitialisation de mot de passe
    public function showResetPasswordForm()
    {
        // Vérifiez si l'OTP a été validé
        if (!session()->has('otp_verified') || !session('otp_verified')) {
            return redirect()->route('otp.verify')->withErrors(['message' => 'Veuillez vérifier d\'abord votre code.']);
        }
        return view('auth.resetpassword');
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ], [
            'password.required' => 'Veuillez entrer un nouveau mot de passe.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
        ]);

        // Récupérer l'identifiant stocké dans la session
        $identifier = session('reset_identifier');

        // Chercher l'utilisateur via son email ou numéro de téléphone
        $user = User::where('email', $identifier)->orWhere('phone', $identifier)->first();

        if (!$user) {
            return back()->withErrors(['identifier' => 'Utilisateur non trouvé.']);
        }

        // Réinitialiser le mot de passe de l'utilisateur
        $user->update([
            'password' => Hash::make($request->password),
            'password_expires_at' => now()->addMonths(1), // Mettre à jour la date d'expiration du mot de passe
        ]);

         // Supprimer les sessions liées au processus de réinitialisation
        session()->forget(['reset_identifier', 'otp_verified']);

        // Rediriger l'utilisateur après un succès
        return redirect()->route('login')->with('success', 'Votre mot de passe a été réinitialisé avec succès.');
    }

}
