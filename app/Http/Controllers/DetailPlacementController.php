<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Placement;
use Illuminate\Support\Facades\Crypt;

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
        $placement = Placement::with('sgi')->findOrFail($placementId);

        // Retourner la vue des détails du placement avec les données récupérées
        return view('home.placement.detailPlacement', compact('placement'));
    }
 
}
