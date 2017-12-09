<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surgery extends Model
{
    protected $fillable = [
        'patient_id', 'date', 'diagnosis', 'therapy', 'surgeon',
        'assistant', 'anesthesia', 'anesthesist', 'text'
        ];

    protected $dates = ['date'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
