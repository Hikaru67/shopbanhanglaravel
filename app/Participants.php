<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'conversation_id', 'customer_id'
    ];
    protected $table = 'participants';
}
