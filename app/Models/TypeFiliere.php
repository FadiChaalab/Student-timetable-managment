<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeFiliere extends Model
{
    use HasFactory;

    public function filieres()
    {
        return $this->hasMany(Filiere::class, 'id_type_filiere');
    }
}