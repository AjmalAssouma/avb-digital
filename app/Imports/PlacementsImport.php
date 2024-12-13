<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Sgi;


// class PlacementsImport implements ToCollection
// {
//     /**
//     * @param Collection $collection
//     */
//     public function collection(Collection $collection)
//     {
//         // Supposons que la première ligne contient les en-têtes
//         $headers = $rows->first()->toArray();
        
//         // Supprimer la première ligne (les en-têtes)
//         $dataRows = $rows->slice(1);

//         // Parcourir chaque ligne de données
//         foreach ($dataRows as $row) {
//             $row = $row->toArray(); // Convertir la collection en tableau

//             // Mapper les données en fonction des en-têtes
//             $data = array_combine($headers, $row);

//             // Vérifiez et insérez les données dans la base de données
//             if (!empty($data['Sgi']) && !empty($data['Designation Sgi']) && !empty($data['Num compte produits'])) {
//                 Sgi::firstOrCreate(
//                     ['code_sgi' => $data['Sgi']],
//                     [
//                         'designation_sgi' => $data['Designation Sgi'],
//                         'num_compte_prod_finan' => $data['Num compte produits'],
//                     ]
//                 );
//             }
//         }
//     }
// }

class PlacementsImport implements ToModel, WithHeadingRow
{
    /**
     * Méthode pour insérer chaque ligne du fichier dans la base de données.
     *
     * @param array $row
     * @return Sgi|null
     */
    public function model(array $row)
    {
        // dd($row);
        Sgi::firstOrCreate(
            ['code_sgi' => $row['sgi']], // Utilisation des en-têtes comme clés
            [
                'designation_sgi' => $row['designation'],
                'num_compte_prod_finan' => $row['num'],
                'users_id' => Auth::id(),
            ]
        );
       
    }
}
