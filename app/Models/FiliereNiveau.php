<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiliereNiveau extends Model
{
    use HasFactory;

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_filiere');
    }

    public function niveau()
    {
        return $this->belongsTo(Niveau::class, 'id_niveau');
    }

    public function modulePlanEtudes()
    {
        return $this->hasMany(Niveau::class, 'id_filiere_niveau');
    }

    public function cursuses()
    {
        return $this->hasMany(Cursus::class, 'id_filiere_niveau');
    }
}