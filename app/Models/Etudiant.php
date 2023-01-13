<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function etatCivil()
    {
        return $this->belongsTo(EtatCivil::class);
    }

    public function etudiantGroupeCursus()
    {
        return $this->belongsTo(EtudiantGroupeCursus::class, 'id_etudiant_groupe_cursus', 'id');
    }
}