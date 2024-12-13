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
        'annee_exercice',
        'date_dernier_paiement',
        'date_arret',
        'nbre_jrs_icne',
        'solde_31_12_n_1',
        'acquisition',
        'remboursement',
        'solde_31_12_n',
        'solde_comptable',
        'ecart',
        'provision_31_12_n',
        'ext_icne_31_12_n_1',
        'interet_recu_31_12_n',
        'icne_31_12_n',
        'interet_controle',
        'interet_comptable',
        'interet_attendu',
        'ecart_paiement',
        'ecart_comptabilise',
        'icne_comptable_31_12_n',
        'ecart_icne',
        'dividende',
        'rendement'
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
