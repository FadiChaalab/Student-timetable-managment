<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeCursus extends Model
{
    use HasFactory;

    public function cursuses()
    {
        return $this->hasMany(Cursus::class);
    }

    public function semesterSessions()
    {
        return $this->hasMany(SemesterSession::class, 'id_type_cursus');
    }
}