<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Histology extends Model
{
    protected $fillable = ['patient_id', 'date', 'filename'];
    protected $dates = ['date'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
