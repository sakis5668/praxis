<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregnancy extends Model
{
    protected $fillable = [
        'patient_id', 'lmp', 'edd',
        'corrected_edd', 'pregnancy_termination_type', 'finished'
    ];

    protected $dates = ['lmp', 'edd', 'corrected_edd'];


    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function pregnancyHistory()
    {
        return $this->hasOne(PregnancyHistory::class);
    }

    public function examinations()
    {
        return $this->hasMany(PregnancyExamination::class);
    }

    public function prenatals()
    {
        return $this->hasMany(PregnancyPrenatal::class);
    }

    public function outcome()
    {
        return $this->hasOne(PregnancyOutcome::class);
    }
}
