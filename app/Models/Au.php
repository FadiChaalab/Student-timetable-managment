<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Au extends Model
{
    use HasFactory;

    public function cursuses()
    {
        return $this->hasMany(Cursus::class, 'id_au', 'id');
    }

    public function semesterAus()
    {
        return $this->hasMany(SemesterAu::class, 'id_au', 'id');
    }
}