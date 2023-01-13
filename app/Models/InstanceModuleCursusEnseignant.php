<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstanceModuleCursusEnseignant extends Model
{
    use HasFactory;

    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class, 'id_enseignant', 'id');
    }

    public function instanceModuleCursus()
    {
        return $this->belongsTo(InstanceModuleCursus::class, 'id_i_m_c', 'id');
    }
}