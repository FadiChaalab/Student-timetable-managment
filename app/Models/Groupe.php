<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    public function cursuses()
    {
        return $this->hasMany(Cursus::class);
    }

    public function groupeCursuses()
    {
        return $this->hasMany(GroupeCursus::class, 'id_groupe', 'id');
    }
}