<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'address', 'email', 'phone', 'fax'];

    // Relation avec les utilisateurs
    public function users()
    {
        return $this->hasMany(User::class, 'idAgency');
    }
}
