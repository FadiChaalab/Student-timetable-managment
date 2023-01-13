<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursus extends Model
{
    use HasFactory;

    public function au()
    {
        return $this->belongsTo(Au::class, 'id_au');
    }

    public function type()
    {
        return $this->belongsTo(TypeCursus::class, 'id_type_cursus');
    }

    public function filiereNiveau()
    {
        return $this->belongsTo(FiliereNiveau::class, 'id_filiere_niveau');
    }

    public function planEtude()
    {
        return $this->belongsTo(PlanEtude::class, 'id_plan_etude');
    }

    public function cursusGroupes()
    {
        return $this->hasMany(Groupe::class, 'id_groupe', 'id');
    }

    public function moduleCursus()
    {
        return $this->hasOne(ModuleCursus::class, 'id_cursus');
    }
}