<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanEtude extends Model
{
    use HasFactory;

    public function ecole()
    {
        return $this->belongsTo(Ecole::class, 'id_ecole');
    }

    public function modulePlanEtudes()
    {
        return $this->hasMany(ModulePlanEtude::class, 'id_plan_etude');
    }

    public function cursuses()
    {
        return $this->hasMany(Cursus::class, 'id_plan_etude');
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_filiere');
    }
}