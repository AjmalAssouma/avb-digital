<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $agencies = Agency::all();
        return view('auth.register', [
            'agencies' => $agencies,
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
            'password' => 'required|string|min:8',
        ]);

        // Nettoyage des champs pour retirer les balises HTML
        $validated['lastname'] = strip_tags($validated['lastname']);
        $validated['firstname'] = strip_tags($validated['firstname']);
        $validated['address'] = strip_tags($validated['address']);
        
        // Formatage des données
        $validated['phone'] = '229' . $validated['phone']; // Concatène '229' avec le numéro de téléphone    

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
            'password' => Hash::make($validated['password']),
        ]);

        // Redirection ou réponse après l'inscription
        return redirect()->route('registration')->with('success', 'Inscription réussie.');
    }

}


