<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumeroCompte extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'num_compte',
        'libelle_numcompte',
        'num_compte_prod_finan',
    ];
}
