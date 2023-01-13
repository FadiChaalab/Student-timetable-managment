<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecole extends Model
{
    use HasFactory;

    public function plantEtudes()
    {
        return $this->hasMany(PlanEtude::class, 'id_ecole');
    }

    public function intanceModuleCursuses()
    {
        return $this->hasMany(InstanceModuleCursus::class, 'id_ecole');
    }
}