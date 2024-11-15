<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPlacement extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'placements_id',
        'annee_excercice',
        'date_dernier_paiement',
        'date_arret',
        'nbre_jrs_icne',
        'periodicite',
        'taux_annuel',
        'taux_periode',
        'solde_31/12',
        'acquisition',
        'remboursement',
        'solde_comptable',
        'ecart',
        'Provision_31/12',
        'ext_icne_31/12',
        'interet_recu_31/12',
        'icne_31/12',
        'interet_controle',
        'interet_comptable',
        'interet_attendu',
        'ecart_paiement',
        'ecart_comptabilise',
        'icne_comptable_31/12',
        'ecart_icne',
    ];

    // Relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    // Relation avec le modèle Placement
    public function placement()
    {
        return $this->belongsTo(Placement::class, 'placements_id');
    }
}
