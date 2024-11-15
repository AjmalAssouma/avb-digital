<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Placement extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'sgis_id',
        'num_compte',
        'type_placement',
        'nom_placement',
        'periodicite',
        'taux_annuel',
        'taux_periode',
        'nbre_titre',
        'valeur_titre',
        'valeur_acq_titre',
        'date_debut',
        'date_fin',
        'duree',
        'gain',
    ];


    /**
     * Relation avec le modèle User.
     * Un placement appartient à un utilisateur.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    /**
     * Relation avec le modèle Sgi.
     * Un placement appartient à une SGI.
     */
    public function sgi()
    {
        return $this->belongsTo(Sgi::class, 'sgis_id');
    }
}
