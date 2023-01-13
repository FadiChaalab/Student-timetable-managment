<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreferenceModuleHoraireEnseignant extends Model
{
    use HasFactory;

    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class, 'id_enseignant', 'id');
    }

    public function jourHoraireHeure()
    {
        return $this->belongsTo(JourHoraireHeure::class, 'id_jhh', 'id');
    }
}