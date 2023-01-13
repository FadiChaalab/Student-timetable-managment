<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horaire extends Model
{
    use HasFactory;

    public function jourHouraireHeures()
    {
        return $this->hasMany(HoraireJourHouraireHeure::class, 'id_horaire');
    }
}