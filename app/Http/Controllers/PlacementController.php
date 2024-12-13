<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sgi;
use App\Models\Placement;
use App\Models\DetailPlacement;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class PlacementController extends Controller
{
    public function showPlacementCreationForm()
    {
        // Récupérer toutes les entrées de la table sgis  
        $sgis = Sgi::all();
        return view('home.placement.creationPlacement', compact('sgis'));
    }

    public function createdPlacementObligation(Request $request)
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

        try{

            // Création du placement dans la base de données
            $placement = Placement::create([
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
                'gain' => $request->gain,
            ]);

            // Appel de la méthode pour créer les détails du placement
            $placement->generateDetailPlacements();

            
            return redirect()->back()->with('success_obligation', 'Le Placement (OBLIGATIONS) a été créé avec succès');
        } catch (\Exception $e) {
            // Retour avec message d'erreur en cas d'exception
            return redirect()->back()->with('error_obligation', 'Une erreur est survenue lors de la création du placement(OBLIGATIONS). Veuillez réessayer.');
        }  
       
    }

    public function createdPlacementAction(Request $request)
    {
        // Validation des champs
        $request->validate([
            'typeplacement_act' => 'required|string',
            'nomplacement_act' => 'required|string',
            'numcompte_act' => 'required|numeric|unique:placements,num_compte',
            'sgisid_act' => 'required|exists:sgis,id',
            'nbretitre_act' => 'required|integer',
            'valeurtitre_act' => 'required|numeric',
            'vacqtitre_act' => 'required|numeric',
            'datestart_act' => 'required|date',
            'dateend_act' => 'required|date|after:date_start',
            'dureeannee_act' => 'required|integer',
            'gain_act' => 'required|numeric',
        ], [
            'typeplacement_act.required' => 'Le type de placement est requis.',
            'nomplacement_act.required' => 'Le nom du placement est requis.',
            'numcompte_act.required' => 'Le numéro de compte est requis.',
            'numcompte_act.unique' => 'Ce numéro de compte existe déjà.',
            'sgisid_act.required' => 'La SGI est requise.',
            'nbretitre_act.required' => 'Le nombre de titres est requis.',
            'valeurtitre_act.required' => 'La valeur du titre est requise.',
            'vacqtitre_act.required' => 'La valeur d\'acquisition du titre est requise.',
            'datestart_act.required' => 'La date de début est requise.',
            'dateend_act.required' => 'La date de fin est requise.',
            'dateend_act.after' => 'La date de fin doit être postérieure à la date de début.',
            'dureeannee_act.required' => 'La durée est requise.',
            'gain_act.required' => 'Le gain est requis.',
        ]);  

        try{

            // Création du placement dans la base de données
            $placement = Placement::create([
                'users_id' => auth()->id(),
                'sgis_id' => $request->sgisid_act,
                'num_compte' => $request->numcompte_act,
                'type_placement' => $request->typeplacement_act,
                'nom_placement' => $request->nomplacement_act,
                'nbre_titre' => $request->nbretitre_act,
                'valeur_titre' => $request->valeurtitre_act,
                'valeur_acq_titre' => $request->vacqtitre_act,
                'date_debut' => $request->datestart_act,
                'date_fin' => $request->dateend_act,
                'duree' => $request->dureeannee_act,
                'gain' => $request->gain_act,
            ]);

            // Appel de la méthode pour créer les détails du placement
            $placement->generateActionsDetailPlacements();
            
            return redirect()->back()->with('success_action', 'Le Placement (ACTIONS) a été créé avec succès.');
        } catch (\Exception $e) {
            Log::error("Une erreur est survenue lors de la création du placement" . $e->getMessage());
            // Retour avec message d'erreur en cas d'exception
            return redirect()->back()->with('error_action', 'Une erreur est survenue lors de la création du placement(ACTIONS). Veuillez réessayer.');
        }  
       
    }

    public function allPlacement()
    {
        $sgis = Sgi::all();
        $placements = Placement::with('sgi')->get();
        return view('home.placement.listPlacement', compact('placements', 'sgis'));
    }

    public function updateObligationsPlacement(Request $request)
    {

        // Définir les messages personnalisés
        $messages = [
            'type_placement.required' => 'Le type de placement est requis.',
            'nom_placement.required' => 'Le nom du placement est requis.',
            'num_compte.required' => 'Le numéro de compte est obligatoire.',
            'num_compte.numeric' => 'Le numéro de compte doit contenir uniquement des chiffres.',
            'num_compte.unique' => 'Ce numéro de compte existe déjà.',
            'taux_annuel.required' => 'Le taux annuel est requis.',
            'taux_periode.required' => 'Le taux période est requis.',
            'periodicite.required' => 'La périodicité est requise.',
            'nbre_titre.required' => 'Le nombre de titres est requis.',
            'nbre_titre.numeric' => 'Le nombre de titre doit contenir uniquement des chiffres.',
            'valeur_titre.required' => 'La valeur du titre est requise.',
            'valeur_titre.numeric' => 'La valeur du titre doit contenir uniquement des chiffres.',
            'valeur_acq_titre.required' => 'La valeur d\'acquisition du titre est requise.',
            'valeur_acq_titre.numeric' => 'La valeur d\'acquisition du titre doit contenir uniquement des chiffres.',
            'date_debut.required' => 'La date de début est requise.',
            'date_fin.required' => 'La date de fin est requise.',
            'date_fin.after' => 'La date de fin doit être postérieure à la date de début.',
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
            'periodicite' => 'required|in:Trimestre,Semestre,Annuel', // Une des valeurs prédéfinies
            'taux_annuel' => 'required|numeric|between:0,100', // Doit être entre 0 et 100
            'taux_periode' => 'required|numeric|between:0,100', // Doit être entre 0 et 100
            'valeur_titre' => 'required|numeric',
            'valeur_acq_titre' => 'required|numeric',
            'duree' => 'required|integer',
            'nom_placement' => 'required|string|max:255',
            'sgis_id' => 'required|integer|exists:sgis,id',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'gain' => 'required|numeric',
        ], $messages);

        // Si la validation échoue, retourner un message d'erreur
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try{
            // Récupération et mise à jour du placement
            $placement = Placement::find($request->id);
            $placement->type_placement = $request->type_placement;
            $placement->num_compte =  $request->num_compte;
            $placement->nbre_titre = $request->nbre_titre;
            $placement->periodicite = $request->periodicite;
            $placement->taux_annuel = $request->taux_annuel;
            $placement->taux_periode = $request->taux_periode;
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
                'message' => 'Placement(OBLIGATIONS) modifié avec succès'
            ]);
        } catch (\Exception $e) {
            // Gestion des erreurs : retourner un message et logger l'erreur
            \Log::error('Erreur lors de la mise à jour du placement : ' . $e->getMessage());
        
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors de la mise à jour du placement. Veuillez réessayer.',
            ], 500); // Code HTTP 500 pour une erreur serveur
        }
    }

    public function updateActionsPlacement(Request $request)
    {

        // Définir les messages personnalisés
        $messages = [
            'type_placement_actions.required' => 'Le type de placement est requis.',
            'nom_placement_actions.required' => 'Le nom du placement est requis.',
            'num_compte_actions.required' => 'Le numéro de compte est obligatoire.',
            'num_compte_actions.numeric' => 'Le numéro de compte doit contenir uniquement des chiffres.',
            'num_compte_actions.unique' => 'Ce numéro de compte existe déjà.',
            'nbre_titre_actions.required' => 'Le nombre de titres est requis.',
            'nbre_titre_actions.numeric' => 'Le nombre de titre doit contenir uniquement des chiffres.',
            'valeur_titre_actions.required' => 'La valeur du titre est requise.',
            'valeur_titre_actions.numeric' => 'La valeur du titre doit contenir uniquement des chiffres.',
            'valeur_acq_titre_actions.required' => 'La valeur d\'acquisition du titre est requise.',
            'valeur_acq_titre_actions.numeric' => 'La valeur d\'acquisition du titre doit contenir uniquement des chiffres.',
            'date_debut_actions.required' => 'La date de début est requise.',
            'date_fin_actions.required' => 'La date de fin est requise.',
            'date_fin_actions.after' => 'La date de fin doit être postérieure à la date de début.',
            'duree_actions.required' => 'La durée est requise.',
            'duree_actions.integer' => 'La durée doit etre un entier.',
            'gain_actions.required' => 'Le gain est requis.',
           
        ];

        // Validation des données entrantes
        $validator = Validator::make($request->all(), [
            'id_actions' => 'required|integer|exists:placements,id',
            'type_placement_actions' => 'required|string|max:255',
            'num_compte_actions' => 'required|numeric|unique:placements,num_compte,' . $request->id_actions,
            'nbre_titre_actions' => 'required|numeric',
            'valeur_titre_actions' => 'required|numeric',
            'valeur_acq_titre_actions' => 'required|numeric',
            'duree_actions' => 'required|integer',
            'nom_placement_actions' => 'required|string|max:255',
            'sgis_id_actions' => 'required|integer|exists:sgis,id',
            'date_debut_actions' => 'required|date',
            'date_fin_actions' => 'required|date|after:date_debut_actions',
            'gain_actions' => 'required|numeric',
        ], $messages);

        // Si la validation échoue, retourner un message d'erreur
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try{
            // Récupération et mise à jour du placement
            $placement = Placement::find($request->id_actions);
            $placement->type_placement = $request->type_placement_actions;
            $placement->num_compte =  $request->num_compte_actions;
            $placement->nbre_titre = $request->nbre_titre_actions;
            $placement->valeur_titre = $request->valeur_titre_actions;
            $placement->valeur_acq_titre = $request->valeur_acq_titre_actions;
            $placement->duree =$request->duree_actions;
            $placement->nom_placement = $request->nom_placement_actions;
            $placement->sgis_id = $request->sgis_id_actions;
            $placement->date_debut = $request->date_debut_actions;
            $placement->date_fin = $request->date_fin_actions;
            $placement->gain = $request->gain_actions;
            $placement->save();

            return response()->json([
                'success' => true, 
                'message' => 'Placement (ACTIONS) modifié avec succès'
            ]);
        } catch (\Exception $e) {
            // Gestion des erreurs : retourner un message et logger l'erreur
            \Log::error('Erreur lors de la mise à jour du placement (ACTIONS) : ' . $e->getMessage());
        
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors de la mise à jour du placement. Veuillez réessayer.',
            ], 500); // Code HTTP 500 pour une erreur serveur
        }
    }

    public function deletePlacement(Request $request)
    {
        // Valider que l'ID existe
        $request->validate([
            'id' => 'required|integer|exists:placements,id',
        ]);

        $placement = Placement::find($request->id);

        if (!$placement) {
            return response()->json([
                'success' => false,
                'message' => 'Placement introuvable.'
            ], 404);
        }

        // Supprimer les détails associés avant de supprimer le placement
        DB::transaction(function () use ($placement) {
            $placement->detailPlacements()->delete();
            $placement->delete();
        });

        return response()->json([
            'success' => true,
            'message' => 'Le placement et ses détails ont été supprimés avec succès.'
        ]);
    }

    public function exportPlacement()
    {
        $placements = Placement::with('sgi', 'detailPlacements')->get();
        return view('home.placement.exportPlacement', compact('placements'));
    }

// ------------------------------------03-12-2024--------------------------------------------------------------
    
    // public function importPlacement(Request $request)
    // {
    //     // Étape 1 : Validation du fichier importé
    //     $validator = Validator::make($request->all(), [
    //         'excelfile' => 'required|file|mimes:xls,xlsx,csv|max:2048', // Max file size: 2MB
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     // Étape 2 : Lecture du fichier
    //     try {
    //         $file = $request->file('excelfile');
    //         $data = Excel::toArray([], $file); // Transforme tout le fichier en tableau
    //         // $data = Excel::getRowIterator([], $file);
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Erreur lors de la lecture du fichier : ' . $e->getMessage());
    //     }

    //     // Vérification : le fichier contient-il des données ?
    //     if (empty($data) || count($data[0]) == 0) {
    //         return redirect()->back()->with('error', 'Le fichier est vide ou illisible.');
    //     }

    //     $rows = $data[0]; // Utiliser la première feuille du fichier




    //     unset($rows[0]); // Supposons que la première ligne contient les en-têtes
        
    //     // Étape 3 : Parcourir et traiter les données
    //     DB::beginTransaction(); // Pour garantir la cohérence des données en cas d'erreur

    //     try {
    //         foreach ($rows as $row) {
    //             // dd($row);

    //             // $date_debut = \Carbon\Carbon::parse($row[5])->format('Y-m-d');
    //             // $date_fin = \Carbon\Carbon::parse($row[6])->format('Y-m-d');

    //             $date_debut = Date::excelToDateTimeObject($row[5])->format('Y-m-d');
    //             $date_fin = Date::excelToDateTimeObject($row[6])->format('Y-m-d');

    //             $date_dernier_paiement = Date::excelToDateTimeObject($row[10])->format('Y-m-d');
    //             $date_arret = Date::excelToDateTimeObject($row[11])->format('Y-m-d');

    //             $taux_annuel = isset($row[14]) ? number_format($row[14] * 100, 2) : null; // Conversion en pourcentage avec 2 décimales
    //             $taux_periode = isset($row[15]) ? number_format($row[15] * 100, 2) : null; // Conversion en pourcentage avec 2 décimales

    //             // 'taux_annuel' => $row[14],
    //             // 'taux_periode' => $row[15],
            
    //             // $rowValidator = Validator::make($row, [
    //             //     0 => 'required|string|max:255', // code_sgi
    //             //     1 => 'required|string|max:255', // designation_sgi
    //             //     2 => 'required|string|max:255', // num_compte_prod_finan
    //             //     // 3 => 'required|string|max:255', // num_compte
    //             //     // 4 => 'required|string|max:255', // type_placement
    //             //     // Ajouter les autres colonnes à valider
    //             // ]);

    //             // if ($rowValidator->fails()) {
    //             //     throw new \Exception('Validation échouée pour la ligne : ' . json_encode($row));
    //             // }

    //             // Étape 3.2 : Vérifier et insérer dans la table `sgis`
    //             $sgi = Sgi::Create([
    //                 'users_id' => auth()->id(),
    //                 'code_sgi' => $row[8],
    //                 'designation_sgi' => $row[9], 
    //                 'num_compte_prod_finan' => $row[2], 
    //             ]
    //             );

    //             // Étape 3.3 : Insérer dans la table `placements`
    //             $placement = Placement::create([
    //                 'users_id' => auth()->id(),
    //                 'sgis_id' => $sgi->id,
    //                 'num_compte' => $row[1],
    //                 'type_placement' => $row[3],
    //                 'nom_placement' => $row[4],
    //                 'periodicite' => $row[13],
    //                 'taux_annuel' => $taux_annuel,
    //                 'taux_periode' => $taux_periode,
    //                 'nbre_titre' => $row[22],
    //                 'valeur_titre' => $row[23],
    //                 'valeur_acq_titre' => $row[23],
    //                 'date_debut' => $date_debut,
    //                 'date_fin' => $date_fin,
    //                 'duree' => $row[7],
    //                 'gain' => $row[100] ?? 0,
    //             ]);

    //             // Étape 3.4 : Insérer dans la table `details_placement`
    //             DetailPlacement::create([
    //                 'users_id' => auth()->id(),
    //                 'placements_id' => $placement->id,
    //                 'annee_exercice' => $row[0],
    //                 'date_dernier_paiement' => $date_dernier_paiement,
    //                 'date_arret' => $date_arret,
    //                 'nbre_jrs_icne' => $row[12],
    //                 'solde_31_12_n_1' => $row[16],
    //                 'acquisition' => $row[17],
    //                 'remboursement' => $row[18],
    //                 'solde_31_12_n' => $row[19],
    //                 'solde_comptable' => $row[20],
    //                 'ecart' => $row[21],
    //                 'provision_31_12_n' => $row[24],
    //                 'ext_icne_31_12_n_1' => $row[25],
    //                 'interet_recu_31_12_n' => $row[26],
    //                 'icne_31_12_n' => $row[27],
    //                 'interet_controle' => $row[28],
    //                 'interet_comptable' => $row[29],
    //                 'interet_attendu' => $row[30],
    //                 'ecart_paiement' => $row[31],
    //                 'ecart_comptabilise' => $row[32],
    //                 'icne_comptable_31_12_n' => $row[33],
    //                 'ecart_icne' => $row[34],
    //             ]);
    //         }

    //         DB::commit(); // Valider les transactions
    //         return redirect()->back()->with('success', 'Les données ont été importées avec succès.');
    //     } catch (\Exception $e) {
    //         Log::error("Erreur lors de l'importation : " .  $e->getMessage());
    //         DB::rollBack(); // Annuler toutes les transactions en cas d'erreur
    //         return redirect()->back()->with('error', 'Erreur lors de l\'importation : ' . $e->getMessage());
    //     }
    // }

// ---------------------------------------------------------------------------------------------------------------------

    public function importPlacement(Request $request)
    {
        // Étape 1 : Validation du fichier importé
        $validator = Validator::make($request->all(), [
            'excelfile' => 'required|file|mimes:xls,xlsx,csv|max:2048', // Max file size: 2MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Étape 2 : Lecture du fichier
        try {
            $file = $request->file('excelfile');
            $data = Excel::toArray([], $file); // Transforme tout le fichier en tableau
            // $data = Excel::getRowIterator([], $file);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la lecture du fichier : ' . $e->getMessage());
        }

        // Vérification : le fichier contient-il des données ?
        if (empty($data) || count($data[0]) == 0) {
            return redirect()->back()->with('error', 'Le fichier est vide ou illisible.');
        }

        $rows = $data[0]; // Utiliser la première feuille du fichier

        // Récupérer les en-têtes (première ligne)
        $headers = array_map('trim', $rows[0]); // Supposons que la première ligne contient les en-têtes

        // Supprimer la ligne des en-têtes pour ne garder que les données
        unset($rows[0]);
        
        // Étape 3 : Parcourir et traiter les données
        DB::beginTransaction(); // Pour garantir la cohérence des données en cas d'erreur

        try {
            foreach ($rows as $row) {

                // Associer chaque valeur à son en-tête
                $rowData = array_combine($headers, $row);

                $date_debut = Date::excelToDateTimeObject($rowData["DATE DEBUT"])->format('Y-m-d');
                $date_fin = Date::excelToDateTimeObject($rowData["DATE FIN"])->format('Y-m-d');

                $date_dernier_paiement = Date::excelToDateTimeObject($rowData["DATE DERNIER PAIEMENT"])->format('Y-m-d');
                $date_arret = Date::excelToDateTimeObject($rowData["DATE ARRETE"])->format('Y-m-d');

                $taux_annuel = isset($rowData["TAUX ANNUEL"]) ? number_format($rowData["TAUX ANNUEL"] * 100, 2) : null; // Conversion en pourcentage avec 2 décimales
                $taux_periode = isset($rowData["TAUX PERIODE"]) ? number_format($rowData["TAUX PERIODE"] * 100, 2) : null; // Conversion en pourcentage avec 2 décimales

                // 'taux_annuel' => $row[14],
                // 'taux_periode' => $row[15],

                // Étape 3.2 : Vérifier et insérer dans la table `sgis`
                $sgi = Sgi::Create([
                    'users_id' => auth()->id(),
                    'code_sgi' => $rowData["SGI"],
                    'designation_sgi' => $rowData["DESIGNATION SGI"], 
                    'num_compte_prod_finan' => $rowData["NUMERO COMPTES PRODUITS FIN"], 
                ]
                );

                // Étape 3.3 : Insérer dans la table `placements`
                $placement = Placement::create([
                    'users_id' => auth()->id(),
                    'sgis_id' => $sgi->id,
                    'num_compte' => $rowData["NUMERO COMPTES"],
                    'type_placement' => $rowData["TYPE PLACEMENT"],
                    'nom_placement' => $rowData["PLACEMENTS"],
                    'periodicite' => $rowData["PERIODICITE"],
                    'taux_annuel' => $taux_annuel,
                    'taux_periode' => $taux_periode,
                    'nbre_titre' => $rowData["NOMBRE TITRE 31/12/N"],
                    'valeur_titre' => $rowData["VALEUR TITRE 31/12/N"],
                    'valeur_acq_titre' => $rowData["VALEUR TITRE 31/12/N"],
                    'date_debut' => $date_debut,
                    'date_fin' => $date_fin,
                    'duree' => $rowData["DUREE"],
                    'gain' => 0,
                ]);

                // Étape 3.4 : Insérer dans la table `details_placement`
                DetailPlacement::create([
                    'users_id' => auth()->id(),
                    'placements_id' => $placement->id,
                    'annee_exercice' => $rowData["ANNEE EXERCICE"],
                    'date_dernier_paiement' => $date_dernier_paiement,
                    'date_arret' => $date_arret,
                    'nbre_jrs_icne' => $rowData["NBRE DE JOURS ICNE"],
                    'solde_31_12_n_1' => $rowData["SOLDE AU 31/12/N1"],
                    'acquisition' => $rowData["ACQ N"],
                    'remboursement' => $rowData["REMB N"],
                    'solde_31_12_n' => $rowData["SOLDE AU 31/12/N"],
                    'solde_comptable' => $rowData["SOLDE COMPTA"],
                    'ecart' => $rowData["ECART"],
                    'provision_31_12_n' => $rowData["PROVISION 31/12/N"],
                    'ext_icne_31_12_n_1' => $rowData["EXT INCNE AU 31/12/N1"],
                    'interet_recu_31_12_n' => $rowData["INTERETS RECUS AU 31/12/N"],
                    'icne_31_12_n' => $rowData["ICNE AU 31/12/N"],
                    'interet_controle' => $rowData["INTERETS CONTRÔLE"],
                    'interet_comptable' => $rowData["INTERETS COMPTA"],
                    'interet_attendu' => $rowData["INTERETS ATTENDUS"],
                    'ecart_paiement' => $rowData["ECARTS PAIEMENT"],
                    'ecart_comptabilise' => $rowData["ECARTS COMPTABILIS"],
                    'icne_comptable_31_12_n' => $rowData["ICNE COMPTA AU 31/12/N"],
                    'ecart_icne' => $rowData["ECART ICNE"],
                ]);
            }

            DB::commit(); // Valider les transactions
            return redirect()->back()->with('success', 'Les données ont été importées avec succès.');
        } catch (\Exception $e) {
            Log::error("Erreur lors de l'importation : " .  $e->getMessage());
            DB::rollBack(); // Annuler toutes les transactions en cas d'erreur
            return redirect()->back()->with('error', 'Erreur lors de l\'importation : ' . $e->getMessage());
        }
    }




   






}
