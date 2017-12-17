<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    protected $fillable = ['patient_id', 'findings', 'instructions','date'];
    protected $dates = ['date'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
