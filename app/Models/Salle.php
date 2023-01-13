<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;

    public function bloc()
    {
        return $this->belongsTo(Bloc::class, 'id_bloc');
    }

    public function etage()
    {
        return $this->belongsTo(Etage::class, 'id_etage');
    }

    public function typeSalle()
    {
        return $this->belongsTo(TypeSalle::class, 'id_type_salle');
    }

    public function salleMateriel()
    {
        return $this->hasOne(SalleMateriel::class, 'id_salle');
    }
}