<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sgi;
use App\Models\Placement;
use Illuminate\Support\Facades\Validator;

class PlacementController extends Controller
{
    public function showPlacementCreationForm()
    {
        // Récupérer toutes les entrées de la table sgis  
        $sgis = Sgi::all();
        return view('home.placement.creationPlacement', compact('sgis'));
    }

    public function createdPlacement(Request $request)
    {
        // Validation des champs
        $request->validate([
            'type_placement' => 'required|string',
            'nom_placement' => 'required|string',
            'num_compte' => 'required|numeric|unique:placements,num_compte',
            'sgis_id' => 'required|exists:sgis,id',
            'taux_annuel' => 'required|numeric|between:0,100', // Doit être entre 0 et 100
            'taux_periode' => 'required|numeric|between:0,100', // Doit être entre 0 et 100
            'periodicite' => 'required|in:Trimestre,Semestre,Annuel', // Une des valeurs prédéfinies
            'nbre_titre' => 'required|integer',
            'valeur_titre' => 'required|numeric',
            'vacq_titre' => 'required|numeric',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
            'duree_annee' => 'required|integer',
            'gain' => 'required|numeric',
        ], [
            'type_placement.required' => 'Le type de placement est requis.',
            'nom_placement.required' => 'Le nom du placement est requis.',
            'num_compte.required' => 'Le numéro de compte est requis.',
            'num_compte.unique' => 'Ce numéro de compte existe déjà.',
            'sgis_id.required' => 'La SGI est requise.',
            'taux_annuel.required' => 'Le taux annuel est requis.',
            'taux_annuel.numeric' => 'Le taux annuel doit être un nombre.',
            'taux_periode.required' => 'Le taux période est requis.',
            'taux_periode.numeric' => 'Le taux période doit être un nombre.',
            'taux_periode.between' => 'Le taux période doit être compris entre 0 et 100.',
            'periodicite.required' => 'La périodicité est requise.',
            'periodicite.in' => 'La périodicité sélectionnée est invalide.',
            'nbre_titre.required' => 'Le nombre de titres est requis.',
            'valeur_titre.required' => 'La valeur du titre est requise.',
            'vacq_titre.required' => 'La valeur d\'acquisition du titre est requise.',
            'date_start.required' => 'La date de début est requise.',
            'date_end.required' => 'La date de fin est requise.',
            'date_end.after' => 'La date de fin doit être postérieure à la date de début.',
            'duree_annee.required' => 'La durée est requise.',
            'gain.required' => 'Le gain est requis.',
        ]);

        // Calcul automatique du gain
        $gain = ($request->valeur_titre - $request->vacq_titre);
        $gain = (int)$gain == $gain ? (int)$gain : $gain; // Affiche le gain sans ".00" si c'est un entier

        try{

            // Création du placement dans la base de données
            Placement::create([
                'users_id' => auth()->id(),
                'sgis_id' => $request->sgis_id,
                'num_compte' => $request->num_compte,
                'type_placement' => $request->type_placement,
                'nom_placement' => $request->nom_placement,
                'periodicite' => $request->periodicite,
                'taux_annuel' => $request->taux_annuel,
                'taux_periode' => $request->taux_periode,
                'nbre_titre' => $request->nbre_titre,
                'valeur_titre' => $request->valeur_titre,
                'valeur_acq_titre' => $request->vacq_titre,
                'date_debut' => $request->date_start,
                'date_fin' => $request->date_end,
                'duree' => $request->duree_annee,
                'gain' => $gain,
            ]);
            
            return redirect()->back()->with('success', 'Placement créé avec succès');
        } catch (\Exception $e) {
            // Retour avec message d'erreur en cas d'exception
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création du placement. Veuillez réessayer.');
        }  
       
    }

    public function allPlacement()
    {
        $sgis = Sgi::all();
        $placements = Placement::with('sgi')->get();
        return view('home.placement.listPlacement', compact('placements', 'sgis'));
    }

    public function updatePlacement(Request $request)
    {

        // Définir les messages personnalisés
        $messages = [
            'type_placement.required' => 'Le type de placement est requis.',
            'nom_placement.required' => 'Le nom du placement est requis.',
            'num_compte.required' => 'Le numéro de compte est obligatoire.',
            'num_compte.numeric' => 'Le numéro de compte doit contenir uniquement des chiffres.',
            'num_compte.unique' => 'Ce numéro de compte existe déjà.',
            'nbre_titre.required' => 'Le nombre de titres est requis.',
            'nbre_titre.numeric' => 'Le nombre de titre doit contenir uniquement des chiffres.',
            'valeur_titre.required' => 'La valeur du titre est requise.',
            'valeur_titre.numeric' => 'La valeur du titre doit contenir uniquement des chiffres.',
            'valeur_acq_titre.required' => 'La valeur d\'acquisition du titre est requise.',
            'valeur_acq_titre.numeric' => 'La valeur d\'acquisition du titre doit contenir uniquement des chiffres.',
            'date_start.required' => 'La date de début est requise.',
            'date_end.required' => 'La date de fin est requise.',
            'date_end.after' => 'La date de fin doit être postérieure à la date de début.',
            'duree.required' => 'La durée est requise.',
            'duree.integer' => 'La durée doit etre un entier.',
            'gain.required' => 'Le gain est requis.',
           
        ];

        // Validation des données entrantes
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:placements,id',
            'type_placement' => 'required|string|max:255',
            'num_compte' => 'required|numeric|unique:placements,num_compte,' . $request->id,
            'nbre_titre' => 'required|numeric',
            'valeur_titre' => 'required|numeric',
            'valeur_acq_titre' => 'required|numeric',
            'duree' => 'required|integer',
            'nom_placement' => 'required|string|max:255',
            'sgis_id' => 'required|integer|exists:sgis,id',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'gain' => 'required|numeric',
        ], $messages);

        // Si la validation échoue, retourner un message d'erreur
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Récupération et mise à jour du placement
        $placement = Placement::find($request->id);
        $placement->type_placement = $request->type_placement;
        $placement->num_compte =  $request->num_compte;
        $placement->nbre_titre = $request->nbre_titre;
        $placement->valeur_titre = $request->valeur_titre;
        $placement->valeur_acq_titre = $request->valeur_acq_titre;
        $placement->duree =$request->duree;
        $placement->nom_placement = $request->nom_placement;
        $placement->sgis_id = $request->sgis_id;
        $placement->date_debut = $request->date_debut;
        $placement->date_fin = $request->date_fin;
        $placement->gain = $request->gain;
        $placement->save();

        return response()->json([
            'success' => true, 
            'message' => 'Placement modifié avec succès'
        ]);
    }


}
