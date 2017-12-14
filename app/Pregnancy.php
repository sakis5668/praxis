<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregnancy extends Model
{
    protected $fillable = [
        'patient_id', 'lmp', 'edd',
        'corrected_edd', 'pregnancy_termination_type_id', 'finished'
    ];

    protected $dates = ['lmp', 'edd', 'corrected_edd'];


    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function pregnancyTerminationType()
    {
        return $this->belongsTo(PregnancyTerminationType::class);
    }

    public function pregnancyHistory()
    {
        return $this->hasOne(PregnancyHistory::class);
    }

    public function examinations()
    {
        return $this->hasMany(PregnancyExamination::class);
    }
}
