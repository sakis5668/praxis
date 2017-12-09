<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = ['history'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
