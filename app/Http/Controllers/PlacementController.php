<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sgi;
use App\Models\Placement;

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
        $gain = ($request->valeur_titre - $request->vacq_titre) * $request->duree_annee;
        $gain = (int)$gain == $gain ? (int)$gain : $gain; // Affiche le gain sans ".00" si c'est un entier

        // Ajout du suffixe '.ans' pour le champ durée
        $duree = $request->duree_annee . ' ans';


        // Création du placement dans la base de données
        Placement::create([
            'users_id' => auth()->id(),
            'sgis_id' => $request->sgis_id,
            'type_placement' => $request->type_placement,
            'nom_placement' => $request->nom_placement,
            'num_compte' => $request->num_compte,
            'nbre_titre' => $request->nbre_titre,
            'valeur_titre' => $request->valeur_titre,
            'valeur_acq_titre' => $request->vacq_titre,
            'date_debut' => $request->date_start,
            'date_fin' => $request->date_end,
            'duree' => $duree,
            'gain' => $gain,
        ]);
        
        return redirect()->back()->with('success', 'Placement créé avec succès');
       
    }

}
