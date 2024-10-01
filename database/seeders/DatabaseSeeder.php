<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Agency;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Récupérer tous les IDs d'agences disponibles
        // $agencyIds = Agency::pluck('id')->toArray();

        // // Vérifier que la liste des agences n'est pas vide
        // if (!empty($agencyIds)) {
        //     // Parcourir chaque utilisateur et attribuer un idAgency de manière aléatoire
        //     User::all()->each(function ($user) use ($agencyIds) {
        //         // Attribuer un idAgency aléatoire depuis la liste des agences
        //         $user->idAgency = $agencyIds[array_rand($agencyIds)];
        //         $user->save(); // Sauvegarder l'utilisateur avec la nouvelle affectation
        //     });
        // }


        // Récupérer l'unique rôle disponible dans la table roles
        $role = Role::first(); // Ou Role::find(1) si tu es sûr que l'id est 1

        // Vérifier que le rôle existe
        if ($role) {
            // Assigner le rôle à chaque utilisateur de manière aléatoire (ici, comme il n'y a qu'un seul rôle, c'est le même pour tous)
            User::all()->each(function ($user) use ($role) {
                $user->idRole = $role->id;
                $user->save();
            });
        }

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
