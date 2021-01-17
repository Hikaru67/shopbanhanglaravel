<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed customer_id
 * @property mixed receiver_id
 * @property mixed content
 * @property mixed type_message
 * @property mixed sender_id
 * @property mixed conversation_id
 * @method static where(string $string, $customer_id)
 */
class Messenger extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'sender_id', 'conversation_id', 'content', 'type_message'
    ];
    protected $table = 'messengers';
}
