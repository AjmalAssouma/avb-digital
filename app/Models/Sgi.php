<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sgi extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'code_sgi',
        'designation_sgi',
        'num_compte_tresor',
    ];

    // Si vous avez une relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
