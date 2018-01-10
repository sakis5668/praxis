<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['id', 'title', 'start', 'end', 'allDay', 'color', 'constraint', 'url',];
}
