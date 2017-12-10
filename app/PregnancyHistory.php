<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PregnancyHistory extends Model
{
    protected $fillable = ['pregnancy_id', 'history'];

    public function pregnancy()
    {
        return $this->belongsTo(Pregnancy::class);
    }
}
