<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtudiantGroupeCursus extends Model
{
    use HasFactory;

    public function student()
    {
        return $this->hasOne(Etudiant::class, 'id', 'id_etudiant');
    }

    public function groupeCursus()
    {
        return $this->hasOne(GroupeCursus::class, 'id', 'id_groupe_cursus');
    }
}