<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PregnancyTerminationType extends Model
{
    public function pregnancies()
    {
        return $this->hasMany(Pregnancy::class);
    }

}
