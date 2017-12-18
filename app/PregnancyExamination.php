<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PregnancyExamination extends Model
{
    protected $fillable = ['pregnancy_id', 'date', 'pregnancy_age', 'findings', 'instructions'];
    protected $dates = ['date'];


    public function pregnancy()
    {
        return $this->belongsTo(Pregnancy::class);
    }

}
