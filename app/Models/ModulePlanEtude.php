<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulePlanEtude extends Model
{
    use HasFactory;

    public function planEtude()
    {
        return $this->belongsTo(PlanEtude::class, 'id_plan_etude');
    }

    public function filiereNiveau()
    {
        return $this->belongsTo(FiliereNiveau::class, 'id_filiere_niveau');
    }

    public function semester()
    {
        return $this->hasOne(Semester::class, 'id', 'id_semester');
    }

    public function moduleCursus()
    {
        return $this->hasOne(ModuleCursus::class, 'id_module_plan_etude', 'id');
    }
}