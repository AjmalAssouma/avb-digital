<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\UserOtp;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class LoginController extends Controller implements \Illuminate\Routing\Controllers\HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'guest', except:['logout']),
            new Middleware(middleware: 'auth', only:['logout']),
        ];
    }

    public function showLoginForm()
    {
        return view("auth.login");
    }


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


    
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'identifier' => ['required'], // Email ou téléphone
            'password' => ['required', 'string'],
        ],[
            'identifier.required' => 'Ce champ est obligatoire',
            'password.required' => 'Le mot de passe est obligatoire'
        ]);

        // Vérifier si l'identifiant est un email ou un téléphone
        $fieldType = filter_var($request->identifier, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        // Si c'est un numéro de téléphone, vérifier s'il est précédé de '229'
        if ($fieldType === 'phone') {
            $identifier = $request->identifier;

            // Si le numéro ne commence pas par '229', on le concatène avec '229'
            if (!Str::startsWith($identifier, '229')) {
                $identifier = '229' . $identifier;
            }

            // Vérifier si le numéro existe dans la base avec le préfixe '229'
            $user = User::where('phone', $identifier)->first();

            if (!$user) {
                return back()->withErrors(['identifier' => 'Le numéro de téléphone est incorrect.'])->onlyInput('identifier');
            }

            // Vérification de l'expiration du mot de passe
            if (!$user->password_expires_at || now()->greaterThan($user->password_expires_at)) {
                return redirect()->route('login')->withErrors(['password_expired' => 'Votre mot de passe a expiré. Veuillez le réinitialiser.']);
            }

            if (Auth::validate(['phone' => $identifier, 'password' => $request->password])) {
                // Générer un OTP aléatoire
                // $otp = rand(123456, 999999);
                $otp = 123456;

                // Stocker l'OTP dans la base de données avec une expiration de 5 minutes
                UserOtp::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'otp' => $otp,
                        'expire_at' => Carbon::now()->addMinutes(1)
                    ]
                );

                // Envoyer le SMS avec l'OTP
                // $smsContent = $otp;
                // self::sendSMS($identifier, $smsContent);

                // Stocker l'identifiant dans la session
                Session::put('otp_identifier', $identifier);

                // Rediriger l'utilisateur vers la page de saisie de l'OTP
                return redirect()->route('auth.otp');
            } else {
                return back()->withErrors(['password' => 'Le mot de passe est incorrect.'])->onlyInput('identifier');
            }

        } else {
            // Vérification normale si c'est un email
            $user = User::where('email', $request->identifier)->first();

            if (!$user) {
                return back()->withErrors(['identifier' => 'L\'email est incorrect.'])->onlyInput('identifier');
            }

             // Vérification de l'expiration du mot de passe
            if (!$user->password_expires_at || now()->greaterThan($user->password_expires_at)) {
                return redirect()->route('login')->withErrors(['password_expired' => 'Votre mot de passe a expiré. Veuillez le réinitialiser.']);
            }

            if (Auth::validate(['email' => $request->identifier, 'password' => $request->password])) {
                // Générer un OTP aléatoire
                // $otp = rand(123456, 999999);
                $otp = 123456;

                // Stocker l'OTP dans la base de données avec une expiration de 1 minutes
                UserOtp::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'otp' => $otp,
                        'expire_at' => Carbon::now()->addMinutes(1)
                    ]
                );

                // Envoi de l'email avec l'OTP
                // $this->notif($user->email, $otp);

                // Stocker l'identifiant dans la session
                Session::put('otp_identifier', $request->identifier);

                // Rediriger l'utilisateur vers la page de saisie de l'OTP
                return redirect()->route('auth.otp');
            } else {
                return back()->withErrors(['password' => 'Le mot de passe est incorrect.'])->onlyInput('identifier');
            }
        }
    }

    public function showOtpForm(Request $request)
    {
        // Récupérer l'email stocké dans la session
        $email_tel = Session::get('otp_identifier');

        if (!$email_tel) {
            return redirect()->route('login'); // Redirige vers la page de connexion si l'email n'est pas disponible
        }

        return view('auth.otp', ['email_tel' => $email_tel]); // Passe l'email ou le téléphone à la vue si nécessaire
    }

    public function verifyOtp(Request $request)
    {
        // Récupérer l'identifiant (email ou téléphone) depuis la session
        $identifier = Session::get('otp_identifier');
    
        // Valider chaque champ du code OTP
        $validated = $request->validate([
            'otp1' => 'required|numeric|digits:1',
            'otp2' => 'required|numeric|digits:1',
            'otp3' => 'required|numeric|digits:1',
            'otp4' => 'required|numeric|digits:1',
            'otp5' => 'required|numeric|digits:1',
            'otp6' => 'required|numeric|digits:1',
        ]);

        $otp = $validated['otp1'].$validated['otp2'].$validated['otp3'].$validated['otp4'].$validated['otp5'].$validated['otp6'];
    
        // Combiner les champs OTP pour former le code complet
        // $otp = $request->otp1 . $request->otp2 . $request->otp3 . $request->otp4 . $request->otp5 . $request->otp6;
    
        // Vérifier si l'identifiant est un email ou un téléphone
        $fieldType = filter_var($identifier, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
    
        // Récupérer l'utilisateur par email ou téléphone
        $user = User::where($fieldType, $identifier)->first();
    
        if (!$user) {
            return back()->withErrors(['otp' => 'Utilisateur introuvable.']);
        }
    
        // Vérifier l'OTP
        $userOtp = UserOtp::where('user_id', $user->id)
            ->where('otp', $otp)
            ->where('expire_at', '>', now())
            ->first();
    
        if ($userOtp) {
            // OTP valide, on peut maintenant authentifier l'utilisateur
            Auth::login($user);
    
            // Vérification de l'authentification
            if (Auth::check()) {
                $request->session()->regenerate();
                Session::forget('otp_identifier');
                // Vérification du rôle de l'utilisateur
            if ($user->role->habilitation === 'SUPER ADMIN') {
                return redirect()->route('admin.home'); // Redirection vers le tableau de bord admin
            }
                return redirect()->route('home'); // Redirection vers la page d'accueil
            } else {
                return back()->withErrors(['otp' => 'Échec de l\'authentification.']);
            }
        } else {
            return back()->withErrors(['otp' => 'OTP invalide ou expiré.']);
        }
    }


    public function resendOtp(Request $request)
    {
        // Récupérer l'identifiant (email ou téléphone) depuis le formulaire
        $identifier = $request->input('email');
    
        // Déterminer si l'identifiant est un email ou un numéro de téléphone
        $fieldType = filter_var($identifier, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
    
        // Si c'est un numéro de téléphone, vérifier s'il commence par '229'
        if ($fieldType === 'phone') {
            // Si le numéro ne commence pas par '229', on le préfixe avec '229'
            if (!Str::startsWith($identifier, '229')) {
                $identifier = '229' . $identifier;
            }
        }
    
        // Récupérer l'utilisateur en fonction du type d'identifiant
        $user = User::where($fieldType, $identifier)->first();
    
        // Vérifier si l'utilisateur existe
        if (!$user) {
            return redirect()->back()->with('error', 'Utilisateur non trouvé.');
        }
    
        // Récupérer le dernier OTP de l'utilisateur
        $latestOtp = UserOtp::where('user_id', $user->id)->latest()->first();
    
        // Vérifier si l'OTP a expiré en utilisant le champ expire_at
        if ($latestOtp && Carbon::now()->lessThan($latestOtp->expire_at)) {
            return redirect()->back()->with('error', 'Veuillez attendre une (1) minutes avant de demander un nouveau code.');
        }
    
        // Générer un nouveau code OTP (à ajuster pour la sécurité en production)
        $newOtp = 654321;
        // $newOtp = random_int(123456, 999999);

        // Vérifier si un OTP existe déjà pour l'utilisateur
        if ($latestOtp) {
            // Mettre à jour seulement le code OTP et la date d'expiration
            UserOtp::updateOrCreate(
                ['user_id' => $user->id],
                ['otp' => $newOtp,
                'expire_at' => Carbon::now()->addMinutes(1)] // Renouvelle la durée de validité du code OTP
            );

             // Envoyer le code OTP par SMS ou email
            if ($fieldType === 'phone') {

                // Envoyer le SMS avec l'OTP
                // $smsContent = "Votre code de vérification est : " . $newOtp;
                // self::sendSMS($identifier, $smsContent);
                return redirect()->back()->with('success', 'Un nouveau code de verification a été renvoyé par SMS.');
            }elseif ($fieldType === 'email') {

                // Envoi de l'email avec l'OTP
                // $this->notif($user->email, $newOtp);
                return redirect()->back()->with('success', 'Un nouveau code de verification a été renvoyé par email.');
            }
        }
        
        // Message de confirmation de l'envoi du nouveau code
        return redirect()->back()->with('success', 'Nouveau code OTP envoyé.');
    }
        
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

}