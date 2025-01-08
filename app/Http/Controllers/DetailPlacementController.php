<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Placement;
use App\Models\DetailPlacement;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;


class DetailPlacementController extends Controller
{
    public function show($id)
    {
        // Déchiffrer l'ID pour obtenir l'ID réel du placement
        try {
            $placementId = Crypt::decrypt($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            // En cas d'erreur de déchiffrement, vous pouvez rediriger ou afficher une erreur
            abort(404, 'Placement non trouvé');
        }

        // Récupérer le placement en utilisant l'ID déchiffré
        // $placement = Placement::with('sgi')->findOrFail($placementId);

        // Récupérer le placement et ses détails
        $placement = Placement::with('sgi', 'detailPlacements')->findOrFail($placementId);

        // Retourner la vue des détails du placement avec les données récupérées
        return view('home.placement.detailPlacement', [
            'placement' => $placement,
            'details' => $placement->detailPlacements, // Collection des détails du placement
        ]);
    }

    /**
     * Méthode pour mettre à jour un détail de placement OBLIGATIONS.
     */
    public function updateObligations(Request $request, $id)
    {
        // Déchiffrer l'ID crypté pour obtenir l'ID réel du placement
        try {
            $placementId = Crypt::decrypt($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404, 'Placement non trouvé');
        }

        // Validation des données
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:detail_placements,id',
            'placements_id' => 'required|exists:placements,id',
            'annee_exercice' => 'required|integer',
            'solde_31_12_n_1' => 'nullable|numeric|min:0',
            'solde_comptable' => 'nullable|numeric',
            'interet_recu_31_12_n' => 'nullable|numeric|min:0',
            'interet_attendu' => 'nullable|numeric|min:0',
            'ecart_icne' => 'nullable|numeric',
            'date_dernier_paiement' => 'nullable|date|before_or_equal:date_arret',
            'date_arret' => 'nullable|date',
            'acquisition' => 'nullable|numeric|min:0',
            'ecart' => 'nullable|numeric',
            'icne_31_12_n' => 'nullable|numeric',
            'ecart_paiement' => 'nullable|numeric',
            'remboursement' => 'nullable|numeric|min:0',
            'provision_31_12_n' => 'nullable|numeric',
            'interet_controle' => 'nullable|numeric',
            'ecart_comptabilise' => 'nullable|numeric',
            'nbre_jrs_icne' => 'nullable|integer|min:0',
            'solde_31_12_n' => 'nullable|numeric|min:0',
            'ext_icne_31_12_n_1' => 'nullable|numeric',
            'interet_comptable' => 'nullable|numeric',
            'icne_comptable_31_12_n' => 'nullable|numeric',
        ], [
            'annee_exercice.required' => 'L\'année d\'exercice est requise.',   
            'solde_31_12_n_1.numeric' => 'Le solde au 31/12/N-1 doit être un nombre.',  
            'solde_31_12_n_1.min' => 'Le solde au 31/12/N-1 ne peut pas être inférieur à zéro.', 
            'solde_comptable.numeric' => 'Le solde comptable doit être un nombre valide.',  
            'interet_recu_31_12_n.numeric' => 'L\'intérêt reçu doit être un nombre valide.',  
            'interet_recu_31_12_n.min' => 'L\'intérêt reçu ne peut pas être inférieur à zéro.',  
            'interet_attendu.numeric' => 'L\'intérêt attendu doit être un nombre valide.',  
            'interet_attendu.min' => 'L\'intérêt attendu ne peut pas être inférieur à zéro.',  
            'ecart_icne.numeric' => 'L\'écart ICNE doit être un nombre valide.',  
            'date_dernier_paiement.date' => 'La date du dernier paiement doit être une date valide.',  
            'date_dernier_paiement.before_or_equal' => 'La date du dernier paiement ne peut pas être postérieure à la date d\'arrêt.',
            'date_arret.date' => 'La date d\'arrêt doit être une date valide.',  
            'acquisition.numeric' => 'L\'acquisition doit être un nombre valide.',  
            'acquisition.min' => 'L\'acquisition ne peut pas être inférieure à zéro.',  
            'ecart.numeric' => 'L\'écart doit être un nombre valide.',  
            'icne_31_12_n.numeric' => 'L\'ICNE doit être un nombre valide.',  
            'ecart_paiement.numeric' => 'L\'écart de paiement doit être un nombre valide.',  
            'remboursement.numeric' => 'Le remboursement doit être un nombre valide.',  
            'remboursement.min' => 'Le remboursement ne peut pas être inférieur à zéro.',  
            'provision_31_12_n.numeric' => 'La provision  doit être un nombre valide.',  
            'interet_controle.numeric' => 'L\'intérêt contrôle doit être un nombre valide.',  
            'ecart_comptabilise.numeric' => 'L\'écart comptabilisé doit être un nombre valide.',  
            'nbre_jrs_icne.integer' => 'Le nombre de jours ICNE doit être un nombre entier.',  
            'nbre_jrs_icne.min' => 'Le nombre de jours ICNE ne peut pas être inférieur à zéro.',  
            'solde_31_12_n.numeric' => 'Le solde doit être un nombre valide.',  
            'solde_31_12_n.min' => 'Le solde ne peut pas être inférieur à zéro.',  
            'ext_icne_31_12_n_1.numeric' => 'L\'ICNE  doit être un nombre valide.',  
            'interet_comptable.numeric' => 'L\'intérêt comptable doit être un nombre valide.',  
            'icne_comptable_31_12_n.numeric' => 'L\'ICNE comptable  doit être un nombre valide.',  
        ]);

        // Vérifier si la validation a échoué
        if ($validator->fails()) {
            \Log::error('Validation échouée:', $validator->errors()->toArray());
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {

            // Trouver le détail existant
            // $detailPlacement = DetailPlacement::findOrFail($request->id);

            // Trouver le détail existant en utilisant l'ID déchiffré
            $detailPlacement = DetailPlacement::where('placements_id', $placementId)->findOrFail($request->id);

            if (!$detailPlacement) {
                \Log::warning('Détail de placement introuvable avec l\'ID : ' . $request->id . ' et placements_id : ' . $placementId);
                return response()->json(['error' => 'Détail de placement introuvable.'], 404);
            }

            // $detailPlacement->update($request->all());

            // Mettre à jour les champs
            $detailPlacement->users_id = auth()->id();
            $detailPlacement->placements_id = $request->placements_id;
            $detailPlacement->annee_exercice = $request->annee_exercice;
            $detailPlacement->date_dernier_paiement = $request->date_dernier_paiement;
            $detailPlacement->date_arret = $request->date_arret;
            $detailPlacement->nbre_jrs_icne = $request->nbre_jrs_icne;
            $detailPlacement->solde_31_12_n_1 = $request->solde_31_12_n_1;
            $detailPlacement->acquisition = $request->acquisition;
            $detailPlacement->remboursement = $request->remboursement;
            $detailPlacement->solde_31_12_n = $request->solde_31_12_n;
            $detailPlacement->solde_comptable = $request->solde_comptable;
            $detailPlacement->ecart = $request->ecart;
            $detailPlacement->provision_31_12_n = $request->provision_31_12_n;
            $detailPlacement->ext_icne_31_12_n_1 = $request->ext_icne_31_12_n_1;
            $detailPlacement->interet_recu_31_12_n = $request->interet_recu_31_12_n;
            $detailPlacement->icne_31_12_n = $request->icne_31_12_n;
            $detailPlacement->interet_controle = $request->interet_controle;
            $detailPlacement->interet_comptable = $request->interet_comptable;
            $detailPlacement->interet_attendu = $request->interet_attendu;
            $detailPlacement->ecart_paiement = $request->ecart_paiement;
            $detailPlacement->ecart_comptabilise = $request->ecart_comptabilise;
            $detailPlacement->icne_comptable_31_12_n = $request->icne_comptable_31_12_n;
            $detailPlacement->ecart_icne = $request->ecart_icne;
            $detailPlacement->save();


            // Retourner une réponse JSON de succès
            return response()->json([
                'success' => true, 
                'message' => 'Mise à jour détail(OBLIGATIONS) réussie.']);
        } catch (\Exception $e) {
            // \Log::error('Erreur inattendue lors de la mise à jour : ' . $e->getMessage(), [
            //     'trace' => $e->getTraceAsString()
            // ]);
            // Gérer les erreurs inattendues
            return response()->json(['error' => 'Une erreur est survenue : ' . $e->getMessage()], 500);
        }
    }

    public function updateActions(Request $request, $id)
    {
        // Déchiffrer l'ID crypté pour obtenir l'ID réel du placement
        try {
            $placementId = Crypt::decrypt($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404, 'Placement non trouvé');
        }

        // Validation des données
        $validator = Validator::make($request->all(), [
            'id_actions_details' => 'required|exists:detail_placements,id',
            'actions_placements_id' => 'required|exists:placements,id',
            'actions_annee_exercice' => 'required|integer',
            'actions_solde_31_12_n_1' => 'nullable|numeric|min:0',
            'actions_solde_comptable' => 'nullable|numeric',
            'actions_dividende' => 'nullable|numeric',
            'actions_rendement' => 'nullable|numeric|between:0,100',
            'actions_interet_recu_31_12_n' => 'nullable|numeric|min:0',
            'actions_interet_attendu' => 'nullable|numeric|min:0',
            'actions_ecart_icne' => 'nullable|numeric',
            'actions_acquisition' => 'nullable|numeric|min:0',
            'actions_ecart' => 'nullable|numeric',
            'actions_icne_31_12_n' => 'nullable|numeric',
            'actions_ecart_paiement' => 'nullable|numeric',
            'actions_remboursement' => 'nullable|numeric|min:0',
            'actions_provision_31_12_n' => 'nullable|numeric',
            'actions_interet_controle' => 'nullable|numeric',
            'actions_ecart_comptabilise' => 'nullable|numeric',
            'actions_solde_31_12_n' => 'nullable|numeric|min:0',
            'actions_ext_icne_31_12_n_1' => 'nullable|numeric',
            'actions_interet_comptable' => 'nullable|numeric',
            'actions_icne_comptable_31_12_n' => 'nullable|numeric',
        ], [
            'actions_annee_exercice.required' => 'L\'année d\'exercice est requise.',   
            'actions_solde_31_12_n_1.numeric' => 'Le solde au 31/12 doit être un nombre.',  
            'actions_solde_31_12_n_1.min' => 'Le solde au 31/12 ne peut pas être inférieur à zéro.', 
            'actions_solde_comptable.numeric' => 'Le solde comptable doit être un nombre valide.', 
            'actions_dividende.numeric' => 'La dividende doit être un nombre valide',
            'actions_rendement.numeric' => 'Le rendement doit être un nombre valide',
            'actions_rendement.between' => 'Le rendement doit être compris entre 0 et 100',
            'actions_interet_recu_31_12_n.numeric' => 'L\'intérêt reçu doit être un nombre valide.',  
            'actions_interet_recu_31_12_n.min' => 'L\'intérêt reçu ne peut pas être inférieur à zéro.',  
            'actions_interet_attendu.numeric' => 'L\'intérêt attendu doit être un nombre valide.',  
            'actions_interet_attendu.min' => 'L\'intérêt attendu ne peut pas être inférieur à zéro.',  
            'actions_ecart_icne.numeric' => 'L\'écart ICNE doit être un nombre valide.',  
            'actions_acquisition.numeric' => 'L\'acquisition doit être un nombre valide.',  
            'actions_acquisition.min' => 'L\'acquisition ne peut pas être inférieure à zéro.',  
            'actions_ecart.numeric' => 'L\'écart doit être un nombre valide.',  
            'actions_icne_31_12_n.numeric' => 'L\'ICNE doit être un nombre valide.',  
            'actions_ecart_paiement.numeric' => 'L\'écart de paiement doit être un nombre valide.',  
            'actions_remboursement.numeric' => 'Le remboursement doit être un nombre valide.',  
            'actions_remboursement.min' => 'Le remboursement ne peut pas être inférieur à zéro.',  
            'actions_provision_31_12_n.numeric' => 'La provision  doit être un nombre valide.',  
            'actions_interet_controle.numeric' => 'L\'intérêt contrôle doit être un nombre valide.',  
            'actions_ecart_comptabilise.numeric' => 'L\'écart comptabilisé doit être un nombre valide.',  
            'actions_solde_31_12_n.numeric' => 'Le solde doit être un nombre valide.',  
            'actions_solde_31_12_n.min' => 'Le solde ne peut pas être inférieur à zéro.',  
            'actions_ext_icne_31_12_n_1.numeric' => 'L\'ICNE  doit être un nombre valide.',  
            'actions_interet_comptable.numeric' => 'L\'intérêt comptable doit être un nombre valide.',  
            'actions_icne_comptable_31_12_n.numeric' => 'L\'ICNE comptable  doit être un nombre valide.',  
        ]);

        // Vérifier si la validation a échoué
        if ($validator->fails()) {
            \Log::error('Validation échouée:', $validator->errors()->toArray());
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {

            // Trouver le détail existant
            // $detailPlacement = DetailPlacement::findOrFail($request->id);

            // Trouver le détail existant en utilisant l'ID déchiffré
            $detailPlacement = DetailPlacement::where('placements_id', $placementId)->findOrFail($request->id_actions_details);

            if (!$detailPlacement) {
                \Log::warning('Détail de placement introuvable avec l\'ID : ' . $request->id_actions_details . ' et placements_id : ' . $placementId);
                return response()->json(['error' => 'Détail de placement introuvable.'], 404);
            }

            // $detailPlacement->update($request->all());

            // Mettre à jour les champs
            $detailPlacement->users_id = auth()->id();
            $detailPlacement->placements_id = $request->actions_placements_id;
            $detailPlacement->annee_exercice = $request->actions_annee_exercice;
            $detailPlacement->solde_31_12_n_1 = $request->actions_solde_31_12_n_1;
            $detailPlacement->acquisition = $request->actions_acquisition;
            $detailPlacement->remboursement = $request->actions_remboursement;
            $detailPlacement->solde_31_12_n = $request->actions_solde_31_12_n;
            $detailPlacement->solde_comptable = $request->actions_solde_comptable;
            $detailPlacement->ecart = $request->actions_ecart;
            $detailPlacement->provision_31_12_n = $request->actions_provision_31_12_n;
            $detailPlacement->ext_icne_31_12_n_1 = $request->actions_ext_icne_31_12_n_1;
            $detailPlacement->interet_recu_31_12_n = $request->actions_interet_recu_31_12_n;
            $detailPlacement->icne_31_12_n = $request->actions_icne_31_12_n;
            $detailPlacement->interet_controle = $request->actions_interet_controle;
            $detailPlacement->interet_comptable = $request->actions_interet_comptable;
            $detailPlacement->interet_attendu = $request->actions_interet_attendu;
            $detailPlacement->ecart_paiement = $request->actions_ecart_paiement;
            $detailPlacement->ecart_comptabilise = $request->actions_ecart_comptabilise;
            $detailPlacement->icne_comptable_31_12_n = $request->actions_icne_comptable_31_12_n;
            $detailPlacement->ecart_icne = $request->actions_ecart_icne;
            $detailPlacement->dividende = $request->actions_dividende;
            $detailPlacement->rendement = $request->actions_rendement;
            $detailPlacement->save();


            // Retourner une réponse JSON de succès
            return response()->json([
                'success' => true, 
                'message' => 'Mise à jour du détail(ACTIONS) réussie.']);
        } catch (\Exception $e) {
            // \Log::error('Erreur inattendue lors de la mise à jour : ' . $e->getMessage(), [
            //     'trace' => $e->getTraceAsString()
            // ]);
            // Gérer les erreurs inattendues
            return response()->json(['error' => 'Une erreur est survenue : ' . $e->getMessage()], 500);
        }
    }

    public function updateDat(Request $request, $id)
    {
        // Déchiffrer l'ID crypté pour obtenir l'ID réel du placement
        try {
            $placementId = Crypt::decrypt($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404, 'Placement non trouvé');
        }

        // Validation des données
        $validator = Validator::make($request->all(), [
            'id_dat' => 'required|exists:detail_placements,id',
            'placementsid_dat' => 'required|exists:placements,id',
            'anneedat_exercice' => 'required|integer',
            'soldedat_31_12_n_1' => 'nullable|numeric|min:0',
            'soldedat_comptable' => 'nullable|numeric',
            'interetdat_recu_31_12_n' => 'nullable|numeric|min:0',
            'interetdat_attendu' => 'nullable|numeric|min:0',
            'ecartdat_icne' => 'nullable|numeric',
            'date_dernierdat_paiement' => 'nullable|date|before_or_equal:date_arret_dat',
            'date_arret_dat' => 'nullable|date',
            'acquisdat' => 'nullable|numeric|min:0',
            'ecart_dat' => 'nullable|numeric',
            'icnedat_31_12_n' => 'nullable|numeric',
            'ecartdat_paiement' => 'nullable|numeric',
            'remboursdat' => 'nullable|numeric|min:0',
            'provisiondat_31_12_n' => 'nullable|numeric',
            'interetdat_controle' => 'nullable|numeric',
            'ecartdat_comptabilise' => 'nullable|numeric',
            'nbredat_jrs_icne' => 'nullable|integer|min:0',
            'soldedat_31_12_n' => 'nullable|numeric|min:0',
            'extdat_icne_31_12_n_1' => 'nullable|numeric',
            'interetdat_comptable' => 'nullable|numeric',
            'icnedat_comptable_31_12_n' => 'nullable|numeric',
        ], [
            'anneedat_exercice.required' => 'L\'année d\'exercice est requise.',   
            'soldedat_31_12_n_1.numeric' => 'Le solde au 31/12/ doit être un nombre.',  
            'soldedat_31_12_n_1.min' => 'Le solde au 31/12/ ne peut pas être inférieur à zéro.', 
            'soldedat_comptable.numeric' => 'Le solde comptable doit être un nombre valide.',  
            'interetdat_recu_31_12_n.numeric' => 'L\'intérêt reçu doit être un nombre valide.',  
            'interetdat_recu_31_12_n.min' => 'L\'intérêt reçu ne peut pas être inférieur à zéro.',  
            'interetdat_attendu.numeric' => 'L\'intérêt attendu doit être un nombre valide.',  
            'interetdat_attendu.min' => 'L\'intérêt attendu ne peut pas être inférieur à zéro.',  
            'ecartdat_icne.numeric' => 'L\'écart ICNE doit être un nombre valide.',  
            'date_dernierdat_paiement.date' => 'La date du dernier paiement doit être une date valide.',  
            'date_dernierdat_paiement.before_or_equal' => 'La date du dernier paiement ne peut pas être postérieure à la date d\'arrêt.',
            'date_arret_dat.date' => 'La date d\'arrêt doit être une date valide.',  
            'acquisdat.numeric' => 'L\'acquisition doit être un nombre valide.',  
            'acquisdat.min' => 'L\'acquisition ne peut pas être inférieure à zéro.',  
            'ecart_dat.numeric' => 'L\'écart doit être un nombre valide.',  
            'icnedat_31_12_n.numeric' => 'L\'ICNE doit être un nombre valide.',  
            'ecartdat_paiement.numeric' => 'L\'écart de paiement doit être un nombre valide.',  
            'remboursdat.numeric' => 'Le remboursement doit être un nombre valide.',  
            'remboursdat.min' => 'Le remboursement ne peut pas être inférieur à zéro.',  
            'provisiondat_31_12_n.numeric' => 'La provision  doit être un nombre valide.',  
            'interetdat_controle.numeric' => 'L\'intérêt contrôle doit être un nombre valide.',  
            'ecartdat_comptabilise.numeric' => 'L\'écart comptabilisé doit être un nombre valide.',  
            'nbredat_jrs_icne.integer' => 'Le nombre de jours ICNE doit être un nombre entier.',  
            'nbredat_jrs_icne.min' => 'Le nombre de jours ICNE ne peut pas être inférieur à zéro.',  
            'soldedat_31_12_n.numeric' => 'Le solde doit être un nombre valide.',  
            'soldedat_31_12_n.min' => 'Le solde ne peut pas être inférieur à zéro.',  
            'extdat_icne_31_12_n_1.numeric' => 'Ext ICNE doit être un nombre valide.',  
            'interetdat_comptable.numeric' => 'L\'intérêt comptable doit être un nombre valide.',  
            'icnedat_comptable_31_12_n.numeric' => 'L\'ICNE comptable  doit être un nombre valide.',  
        ]);

        // Vérifier si la validation a échoué
        if ($validator->fails()) {
            \Log::error('Validation échouée:', $validator->errors()->toArray());
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {

            // Trouver le détail existant
            // $detailPlacement = DetailPlacement::findOrFail($request->id);

            // Trouver le détail existant en utilisant l'ID déchiffré
            $detailPlacement = DetailPlacement::where('placements_id', $placementId)->findOrFail($request->id_dat);

            if (!$detailPlacement) {
                \Log::warning('Détail de placement introuvable avec l\'ID : ' . $request->id_dat . ' et placementsid_dat : ' . $placementId);
                return response()->json(['error' => 'Détail de placement introuvable.'], 404);
            }

            // $detailPlacement->update($request->all());

            // Mettre à jour les champs
            $detailPlacement->users_id = auth()->id();
            $detailPlacement->placements_id = $request->placementsid_dat;
            $detailPlacement->annee_exercice = $request->anneedat_exercice;
            $detailPlacement->date_dernier_paiement = $request->date_dernierdat_paiement;
            $detailPlacement->date_arret = $request->date_arret_dat;
            $detailPlacement->nbre_jrs_icne = $request->nbredat_jrs_icne;
            $detailPlacement->solde_31_12_n_1 = $request->soldedat_31_12_n_1;
            $detailPlacement->acquisition = $request->acquisdat;
            $detailPlacement->remboursement = $request->remboursdat;
            $detailPlacement->solde_31_12_n = $request->soldedat_31_12_n;
            $detailPlacement->solde_comptable = $request->soldedat_comptable;
            $detailPlacement->ecart = $request->ecart_dat;
            $detailPlacement->provision_31_12_n = $request->provisiondat_31_12_n;
            $detailPlacement->ext_icne_31_12_n_1 = $request->extdat_icne_31_12_n_1;
            $detailPlacement->interet_recu_31_12_n = $request->interetdat_recu_31_12_n;
            $detailPlacement->icne_31_12_n = $request->icnedat_31_12_n;
            $detailPlacement->interet_controle = $request->interetdat_controle;
            $detailPlacement->interet_comptable = $request->interetdat_comptable;
            $detailPlacement->interet_attendu = $request->interetdat_attendu;
            $detailPlacement->ecart_paiement = $request->ecartdat_paiement;
            $detailPlacement->ecart_comptabilise = $request->ecartdat_comptabilise;
            $detailPlacement->icne_comptable_31_12_n = $request->icnedat_comptable_31_12_n;
            $detailPlacement->ecart_icne = $request->ecartdat_icne;
            $detailPlacement->save();


            // Retourner une réponse JSON de succès
            return response()->json([
                'success' => true, 
                'message' => 'Mise à jour détail(DAT) réussie.']);
        } catch (\Exception $e) {
            // \Log::error('Erreur inattendue lors de la mise à jour : ' . $e->getMessage(), [
            //     'trace' => $e->getTraceAsString()
            // ]);
            // Gérer les erreurs inattendues
            return response()->json(['error' => 'Une erreur est survenue : ' . $e->getMessage()], 500);
        }
    }


    public function deleteDetail(Request $request, $id)
    {
        // Déchiffrer l'ID crypté pour obtenir l'ID réel du placement
        try {
            $placementId = Crypt::decrypt($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404, 'Placement non trouvé');
        }

        // Valider que l'ID existe
        $request->validate([
            'id' => 'required|integer|exists:detail_placements,id',
        ]);

        // Rechercher et supprimer l'enregistrement
        $detailPlace = DetailPlacement::where('placements_id', $placementId)->find($request->id);

        if ($detailPlace) {
            $detailPlace->delete();
            return response()->json([
                'success' => true,
                'message' => 'Le détail a été supprimé avec succès.'
            ]);

            return response()->json(['success' => false], 404);
        }
    }
 
}
