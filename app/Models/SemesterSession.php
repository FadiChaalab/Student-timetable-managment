<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterSession extends Model
{
    use HasFactory;

    public function typeCursus()
    {
        return $this->belongsTo(TypeCursus::class, 'id_type_cursus');
    }
}