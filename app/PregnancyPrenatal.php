<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PregnancyPrenatal extends Model
{
    protected $fillable = ['pregnancy_id', 'type', 'date', 'pregnancy_age', 'examiner','findings'];
    protected $dates = ['date'];

    public function pregnancy()
    {
        return $this->belongsTo(Pregnancy::class);
    }
}
