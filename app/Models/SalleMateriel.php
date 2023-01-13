<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalleMateriel extends Model
{
    use HasFactory;

    public function salle()
    {
        return $this->belongsTo(Salle::class, 'id_salle');
    }

    public function materiel()
    {
        return $this->belongsTo(Materiel::class, 'id_materiel');
    }
}