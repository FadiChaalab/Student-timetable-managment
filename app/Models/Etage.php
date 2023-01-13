<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etage extends Model
{
    use HasFactory;

    public function salles()
    {
        return $this->hasMany(Salle::class, 'id_etage');
    }
}