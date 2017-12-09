<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cytology extends Model
{
    protected $fillable = ['patient_id', 'date', 'filename'];
    protected $dates = ['date'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
