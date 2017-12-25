<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Physician extends Model
{
    protected $fillable = ['name', 'specialty', 'information', 'address', 'postal', 'city'];


    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}
