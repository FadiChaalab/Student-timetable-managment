<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstanceGroupeHoraire extends Model
{
    use HasFactory;

    public function groupeCursus()
    {
        return $this->belongsTo(GroupeCursus::class, 'id_groupe_cursus', 'id');
    }

    public function horaire()
    {
        return $this->belongsTo(Horaire::class, 'id_horaire', 'id');
    }
}