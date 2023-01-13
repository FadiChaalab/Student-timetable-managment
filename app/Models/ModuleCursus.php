<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleCursus extends Model
{
    use HasFactory;

    public function modulePlanEtude()
    {
        return $this->belongsTo(ModulePlanEtude::class, 'id_module_plan_etude');
    }

    public function cursus()
    {
        return $this->belongsTo(Cursus::class, 'id_cursus');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'id_semester');
    }

    public function instanceModuleCursuses()
    {
        return $this->hasMany(InstanceModuleCursus::class, 'id_module_cursus');
    }
}