<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;

    public function niveauFilieres()
    {
        return $this->hasMany(FiliereNiveau::class, 'id_niveau');
    }
}