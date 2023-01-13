<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupeCursus extends Model
{
    use HasFactory;

    public function groupe()
    {
        return $this->belongsTo(Groupe::class, 'id_groupe');
    }

    public function cursus()
    {
        return $this->belongsTo(Cursus::class, 'id_cursus');
    }
}