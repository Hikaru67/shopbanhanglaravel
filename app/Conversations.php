<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversations extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'title', 'last_user', 'preview', 'creator_id'
    ];
    protected $table = 'conversations';
}
