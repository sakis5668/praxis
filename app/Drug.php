<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    protected $fillable = [
        'drug_company_id', 'name', 'information', 'content',
        'dosage', 'filename'
    ];

    public function drugCompany()
    {
        return $this->belongsTo(DrugCompany::class);
    }
}
