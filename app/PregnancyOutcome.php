<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PregnancyOutcome extends Model
{
    protected $fillable = ['pregnancy_id', 'date', 'termination_type', 'gender', 'weight', 'delivery_type', 'indication', 'comment'];
    protected $dates = ['date'];


    public function pregnancy()
    {
        return $this->belongsTo(Pregnancy::class);
    }
}
