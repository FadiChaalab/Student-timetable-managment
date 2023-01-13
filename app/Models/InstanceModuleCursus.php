<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstanceModuleCursus extends Model
{
    use HasFactory;

    public function ecole()
    {
        return $this->belongsTo(Ecole::class, 'id_ecole');
    }

    public function moduleCursus()
    {
        return $this->belongsTo(ModuleCursus::class, 'id_module_cursus');
    }

    public function semesterAu()
    {
        return $this->belongsTo(SemesterAu::class, 'id_semester_au');
    }
}