<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sgi;
use App\Models\DetailPlacement;
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
            'num_compte_tres.required' => 'Le numéro de compte est obligatoire.',
            'num_compte_tres.numeric' => 'Le numéro de compte doit contenir uniquement des chiffres.',
            'num_compte_tres.unique' => 'Ce numéro de compte existe déjà.',
        ];
        // Valider les données du formulaire
        $validator = Validator::make($request->all(), [
            'code_sgi' => 'required|string|max:255',
            'designation_sgi' => 'required|string|max:255',
            'num_compte_tres' => 'required|numeric|unique:sgis,num_compte_tresor',
        ], $messages);

        // Si la validation échoue, retourner un message d'erreur
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try{
            // Création de la SGI
            Sgi::create([
                'users_id' => auth()->id(), // Récupérer l'ID de l'utilisateur authentifié
                'code_sgi' => strtoupper($request->code_sgi), // Mettre en majuscule
                'designation_sgi' => $request->designation_sgi,
                'num_compte_tresor' => $request->num_compte_tres,
            ]);

            // Retourner une réponse JSON de succès
            return response()->json(['success' => true, 'message' => 'SGI créée avec succès!']);
        } catch (\Exception $e) {
            Log::error("Une erreur s\'est produite lors de la création de la SGI." . $e->getMessage() );
            // Gérer les exceptions
            return response()->json([
                'success' => false,
                'message' => 'Une erreur s\'est produite lors de la création de la SGI.',
                'error' => $e->getMessage() // Facultatif, peut être retiré en production
            ], 500);
        }
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
            'num_compte_tres.required' => 'Le numéro de compte est obligatoire.',
            'num_compte_tres.numeric' => 'Le numéro de compte doit contenir uniquement des chiffres.',
            'num_compte_tres.unique' => 'Ce numéro de compte existe déjà.',
        ];

        // Valider les données du formulaire
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:sgis,id',
            'code_sgi' => 'required|string|max:255',
            'designation_sgi' => 'required|string|max:255',
            'num_compte_tres' => 'required|numeric|unique:sgis,num_compte_tresor,' . $request->id,
        ], $messages);

        // Si la validation échoue, retourner un message d'erreur
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try{

            // Mise à jour de la SGI
            $sgi = Sgi::findOrFail($request->id);
            $sgi->code_sgi = $request->code_sgi;
            $sgi->designation_sgi = $request->designation_sgi;
            $sgi->num_compte_tresor = $request->num_compte_tres;
            $sgi->save();

            // Retourner une réponse de succès
            return response()->json([
                'success' => true,
                'message' => 'La SGI a été mise à jour avec succès.'
            ]);
        } catch (\Exception $e) {
            // Gérer les exceptions
            return response()->json([
                'success' => false,
                'message' => 'Une erreur s\'est produite lors de la mise à jour de la SGI.',
                'error' => $e->getMessage() // Facultatif, à retirer en production
            ], 500);
        }
    }

    public function deleteSgi(Request $request)
    {
        try{
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
            return response()->json(['success' => false, 'message' => 'Élément non trouvé ou suppression échouée.'], 404);

        }catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Erreur serveur.'], 500);
        }

       
    }

}
