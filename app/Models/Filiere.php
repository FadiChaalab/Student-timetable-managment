<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function filiereNiveaux()
    {
        return $this->hasMany(FiliereNiveau::class, 'id_filiere');
    }

    public function type()
    {
        return $this->belongsTo(TypeFiliere::class, 'id_type_filiere');
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'id_departement');
    }

    public function planEtudes()
    {
        return $this->hasMany(PlanEtude::class, 'id_filiere');
    }
}