<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterAu extends Model
{
    use HasFactory;

    public function au()
    {
        return $this->belongsTo(Au::class, 'id_au');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'id_semester');
    }

    public function instanceModuleCursuses()
    {
        return $this->hasMany(InstanceModuleCursus::class, 'id_semester_au');
    }
}