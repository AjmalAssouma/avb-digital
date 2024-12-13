<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Closure;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller implements \Illuminate\Routing\Controllers\HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'auth'),
            new Middleware(middleware: 'inactivity.logout'),
        ];
    }

    public function showProfileUser()
    {
        $user = Auth::user()->load('agency', 'role'); // Charger les relations agency et role
        return view('home.profil', compact('user')); // Passer l'objet utilisateur complet à la vue
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $validated = $request->validate([
            'current_password' => [
                'required',
                'string',
                function (string $attribute, mixed $value, Closure $fail) use ($user) {
                    // Vérification que le mot de passe actuel est correct
                    if (! Hash::check($value, $user->password)) {
                        $fail("Le mot de passe actuel est erroné.");
                    }
                },
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
           'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.', // Message pour la confirmation
        ]);

        $user->update([
            'password' => Hash::make($validated['password']),
            'password_expires_at' => now()->addMonths(3), // Ajouter 3 mois à la date actuelle
        ]);

        return redirect()->route('home.userprofil')->with('successpass', 'Mot de passe modifié avec succès.');
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();

        // Si l'utilisateur a déjà une photo, on la supprime
        if ($user->profile_photo) {
            Storage::delete($user->profile_photo);
        }

        // Sauvegarder la nouvelle photo
        $path = $request->file('profile_photo')->store('profile_photos');

        // Mettre à jour l'utilisateur
        $user->profile_photo = $path;
        $user->save();

        return redirect()->back()->with('success', 'Photo de profil mise à jour');
    }


    // Méthode pour mettre à jour les informations utilisateur
    public function updateUserInfo(Request $request)
    {
        // Récupérer toutes les données du formulaire
        $data = $request->all();

        // Vérification et ajout du préfixe '229' si nécessaire
        if (!str_starts_with($data['phone'], '229')) {
            $data['phone'] = '229' . $data['phone'];
        }

        // Validation des données reçues
        $validator = Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|numeric|digits_between:11,18', // Ajustement pour prendre en compte le préfixe
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'address' => 'nullable|string|max:255',
            'birthdate' => 'required|date',
        ], [
            'email.unique' => 'Cet email est déjà utilisé.',
        ]);

        // Si la validation échoue, rediriger avec les erreurs
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Récupérer l'utilisateur authentifié
        $user = Auth::user();

        // Mise à jour des informations utilisateur
        $user->update([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'address' => $data['address'],
            'birthdate' => $data['birthdate'],
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('home.userprofil')->with('successinfo', 'Vos informations ont été mises à jour avec succès.');
    }
}
