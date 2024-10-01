<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $agencies = Agency::all();
        $roles = Role::all();
        return view('auth.register', [
            'agencies' => $agencies,
            'roles' => $roles,
        ]);
    }

    public function register(Request $request)
    {
        // Validation des champs du formulaire
        $validated = $request->validate([
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'mail' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|string|regex:/^[0-9]{8}$/',
            'birthdate' => 'nullable|date',
            'address' => 'required|string|max:255',
            'gender' => 'required|in:M,F',
            'idAgency' => 'required|exists:agencies,id', // Validation de l'agence
            'idRole' => 'nullable|exists:roles,id', // Si un rôle est sélectionné, vérifier qu'il est valide
            'password' => 'required|string|min:8',
        ]);

        // Nettoyage des champs pour retirer les balises HTML
        $validated['lastname'] = strip_tags($validated['lastname']);
        $validated['firstname'] = strip_tags($validated['firstname']);
        $validated['address'] = strip_tags($validated['address']);
        
        // Formatage des données
        $validated['phone'] = '229' . $validated['phone']; // Concatène '229' avec le numéro de téléphone 
        
        // Si l'utilisateur n'a pas sélectionné de rôle, attribuer le rôle 'USERS' (id = 2)
        $validated['idRole'] = $request->input('idRole') ?? 2;

        // Création de l'utilisateur
        $user = User::create([
            'lastname' => $validated['lastname'],
            'firstname' => $validated['firstname'],
            'email' => $validated['mail'],
            'phone' => $validated['phone'],
            'birthdate' => $validated['birthdate'] ?? null, // Enregistre null si la date est vide
            'address' => $validated['address'],
            'gender' => $validated['gender'],
            'idAgency' => $validated['idAgency'], // Enregistre l'agence sélectionnée
            'idRole' => $validated['idRole'], // Enregistre le rôle, avec 'USERS' par défaut
            'password' => Hash::make($validated['password']),
            'password_expires_at' => now()->addMonths(1), // Expiration du mot de passe dans 3 mois
        ]);

        // Redirection ou réponse après l'inscription
        return redirect()->route('registration')->with('success', 'Inscription réussie.');
    }

}


