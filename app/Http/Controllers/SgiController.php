<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sgi;
use Illuminate\Support\Facades\Validator;

class SgiController extends Controller
{
    public function showSgiCreationForm()
    {
        return view('home.sgi.listSgi');
    }
    public function createSgi(Request $request)
    {
        // Définir les messages personnalisés
        $messages = [
            'designation_sgi.required' => 'La désignation de la SGI est obligatoire.',
            'code_sgi.required' => 'Le code de la SGI est obligatoire.',
            'num_compte_prod_finan.required' => 'Le numéro de compte est obligatoire.',
            'num_compte_prod_finan.numeric' => 'Le numéro de compte du produit financier doit contenir uniquement des chiffres.',
            'num_compte_prod_finan.unique' => 'Ce numéro de compte du produit financier existe déjà.',
        ];
        // Valider les données du formulaire
        $validator = Validator::make($request->all(), [
            'code_sgi' => 'required|string|max:255',
            'designation_sgi' => 'required|string|max:255',
            'num_compte_prod_finan' => 'required|numeric|unique:sgis,num_compte_prod_finan',
        ], $messages);

        // Si la validation échoue, retourner un message d'erreur
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Création de la SGI
        Sgi::create([
            'code_sgi' => strtoupper($request->code_sgi), // Mettre en majuscule
            'designation_sgi' => $request->designation_sgi,
            'num_compte_prod_finan' => $request->num_compte_prod_finan,
            'users_id' => auth()->id() // Récupérer l'ID de l'utilisateur authentifié
        ]);

        // Retourner une réponse JSON de succès
        return response()->json(['success' => true, 'message' => 'SGI créée avec succès!']);
    }

    public function allSgi(){
        // Récupérer toutes les entrées de la table sgis  
        $sgis = Sgi::all();

        return view('home.sgi.listSgi',compact('sgis'));
    }

    public function updateSgi(Request $request)
    {
        // Définir les messages personnalisés
        $messages = [
            'designation_sgi.required' => 'La désignation de la SGI est obligatoire.',
            'code_sgi.required' => 'Le code SGI est obligatoire.',
            'num_compte_prod_finan.required' => 'Le numéro de compte est obligatoire.',
            'num_compte_prod_finan.numeric' => 'Le numéro de compte du produit financier doit contenir uniquement des chiffres.',
            'num_compte_prod_finan.unique' => 'Ce numéro de compte du produit financier existe déjà.',
        ];
        // Valider les données du formulaire
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:sgis,id',
            'code_sgi' => 'required|string|max:255',
            'designation_sgi' => 'required|string|max:255',
            'num_compte_prod_finan' => 'required|numeric|unique:sgis,num_compte_prod_finan,' . $request->id,
        ], $messages);

        // Si la validation échoue, retourner un message d'erreur
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Récupérer la SGI existante et mettre à jour les informations
        $sgi = Sgi::find($request->id);
        $sgi->code_sgi = $request->code_sgi;
        $sgi->designation_sgi = $request->designation_sgi;
        $sgi->num_compte_prod_finan = $request->num_compte_prod_finan;
        $sgi->save();

        // Retourner une réponse de succès
        return response()->json([
            'success' => true,
            'message' => 'La SGI a été mise à jour avec succès.'
        ]);
    }

    public function deleteSgi(Request $request)
    {
        // Valider que l'ID existe
        $request->validate([
            'id' => 'required|integer|exists:sgis,id',
        ]);

        // Rechercher et supprimer l'enregistrement
        $sgi = Sgi::find($request->id);
        if ($sgi) {
            $sgi->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

}
