<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlacementSgi extends Model
{
    use HasFactory;

    public function sgi()
    {
        return $this->belongsTo(Sgi::class, 'sgis_id');
    }

    public function placement()
    {
        return $this->belongsTo(Placement::class, 'placements_id');
    }
}
