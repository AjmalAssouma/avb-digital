<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function detailPlacements()
    {
        return $this->hasMany(DetailPlacement::class, 'placements_id');
    }

    /**
     * Génère les enregistrements dans la table detail_placements
     * avec les dates de dernier paiement et de fin.
     * @return void
     */

    // public function generateDetailPlacements()
    // {
    //     // Convertir les dates de début et de fin en objets DateTime
    //     $dateStart = new \DateTime($this->date_debut);
    //     $dateEnd = new \DateTime($this->date_fin);

    //     // Calculer la durée en années
    //     $duree = (int)$dateStart->diff($dateEnd)->y;

    //     // Initialiser les enregistrements à insérer
    //     $details = [];

    //     // Générer les enregistrements pour chaque année
    //     for ($i = 0; $i <= $duree; $i++) {
    //         $anneeExercice = (int)$dateStart->format('Y') + $i; // Année correspondante

    //         $details[] = [
    //             'users_id' =>  auth()->id(),
    //             'placements_id' => $this->id, // ID du placement
    //             'annee_excercice' => $anneeExercice, // Année d'exercice
    //             'created_at' => now(), // Timestamp de création
    //             'updated_at' => now(), // Timestamp de mise à jour
    //         ];
    //     }

    //     // Insérer les enregistrements dans la table detail_placements
    //     DetailPlacement::insert($details);
    // }

    public function generateDetailPlacements()
    {
        // Convertir les dates de début et de fin en instances Carbon pour une manipulation facile
        $dateStart = Carbon::parse($this->date_debut);
        $dateEnd = Carbon::parse($this->date_fin);

        // Calculer la durée en années (inclusivement)
        $duree = $dateStart->diffInYears($dateEnd);

        // Initialiser un tableau pour stocker les enregistrements à insérer
        $details = [];

        // Générer les enregistrements pour chaque année d'exercice
        for ($i = 0; $i <= $duree; $i++) {
            // Déterminer l'année d'exercice courante
            $anneeExercice = $dateStart->copy()->addYears($i)->year;

            // Déterminer la date de dernier paiement (18/11 de l'année courante)
            $dateDernierPaiement = Carbon::create($anneeExercice, $dateStart->month, $dateStart->day);

            // Déterminer la date d'arrêt (31/12 de l'année courante)
            $dateArret = Carbon::create($anneeExercice, 12, 31);

            // Calculer le nombre de jours d'intérêts courus non échus
            $joursInteretsCourus = $dateDernierPaiement->diffInDays($dateArret);

            // Ajouter l'enregistrement au tableau
            $details[] = [
                'users_id' => auth()->id(), // ID de l'utilisateur associé
                'placements_id' => $this->id, // ID du placement
                'annee_exercice' => $anneeExercice, // Année d'exercice
                'date_dernier_paiement' => $dateDernierPaiement, // Date de dernier paiement
                'date_arret' => $dateArret, // Date d'arrêt
                'nbre_jrs_icne' => $joursInteretsCourus, // Nombre de jours d'intérêts courus

                // Initialiser toutes les autres colonnes à 0
                'solde_31_12_n_1' => 0,
                'acquisition' => 0,
                'remboursement' => 0,
                'solde_31_12_n' => 0,
                'solde_comptable' => 0,
                'ecart' => 0,
                'provision_31_12_n' => 0,
                'ext_icne_31_12_n_1' => 0,
                'interet_recu_31_12_n' => 0,
                'icne_31_12_n' => 0,
                'interet_controle' => 0,
                'interet_comptable' => 0,
                'interet_attendu' => 0,
                'ecart_paiement' => 0,
                'ecart_comptabilise' => 0,
                'icne_comptable_31_12_n' => 0,
                'ecart_icne' => 0,
                'dividende' => null,
                'rendement' => null,
                'created_at' => now(), // Date de création
                'updated_at' => now(), // Date de mise à jour
            ];
        }

        // Insérer les enregistrements dans la table detail_placements en une seule requête
        DetailPlacement::insert($details);
    }

    public function generateActionsDetailPlacements()
    {
        // Convertir les dates de début et de fin en instances Carbon pour une manipulation facile
        $dateStart = Carbon::parse($this->date_debut);
        $dateEnd = Carbon::parse($this->date_fin);

        // Calculer la durée en années (inclusivement)
        $duree = $dateStart->diffInYears($dateEnd);

        // Initialiser un tableau pour stocker les enregistrements à insérer
        $details = [];

        // Générer les enregistrements pour chaque année d'exercice
        for ($i = 0; $i <= $duree; $i++) {
            // Déterminer l'année d'exercice courante
            $anneeExercice = $dateStart->copy()->addYears($i)->year;

            // Ajouter l'enregistrement au tableau
            $details[] = [
                'users_id' => auth()->id(), // ID de l'utilisateur associé
                'placements_id' => $this->id, // ID du placement
                'annee_exercice' => $anneeExercice, // Année d'exercice
                'date_dernier_paiement' => null, // Date de dernier paiement
                'date_arret' => null, // Date d'arrêt
                'nbre_jrs_icne' => null, // Nombre de jours d'intérêts courus

                // Initialiser toutes les autres colonnes à 0
                'solde_31_12_n_1' => 0,
                'acquisition' => 0,
                'remboursement' => 0,
                'solde_31_12_n' => 0,
                'solde_comptable' => 0,
                'ecart' => 0,
                'provision_31_12_n' => 0,
                'ext_icne_31_12_n_1' => 0,
                'interet_recu_31_12_n' => 0,
                'icne_31_12_n' => 0,
                'interet_controle' => 0,
                'interet_comptable' => 0,
                'interet_attendu' => 0,
                'ecart_paiement' => 0,
                'ecart_comptabilise' => 0,
                'icne_comptable_31_12_n' => 0,
                'ecart_icne' => 0,
                'dividende' => 0,
                'rendement' => 0,
                'created_at' => now(), // Date de création
                'updated_at' => now(), // Date de mise à jour
            ];
        }

        // Insérer les enregistrements dans la table detail_placements en une seule requête
        DetailPlacement::insert($details);
    }
}
