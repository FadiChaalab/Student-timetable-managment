<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JourHoraireHeure extends Model
{
    use HasFactory;

    public function jour()
    {
        return $this->belongsTo(HoraireJour::class, 'id_horaire_jour');
    }

    public function heure()
    {
        return $this->belongsTo(HoraireHeure::class, 'id_horaire_heure');
    }

    public function horaire()
    {
        return $this->belongsTo(Horaire::class, 'id_horaire');
    }
}