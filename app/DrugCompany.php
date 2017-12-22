<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrugCompany extends Model
{
    protected $fillable = [
        'name', 'subtitle', 'street', 'postal', 'city',
        'email', 'website', 'phone', 'fax', 'logo'
    ];
}
