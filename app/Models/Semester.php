<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    public function modulePlanEtudes()
    {
        return $this->hasMany(ModulePlanEtude::class, 'id_semester');
    }

    public function moduleCursuses()
    {
        return $this->hasMany(ModuleCursus::class, 'id_semester');
    }

    public function semesterAu()
    {
        return $this->hasOne(SemesterAu::class, 'id_semester');
    }
}