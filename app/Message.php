<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function directmessage()
    {
        return $this->belongsTo(DirectMessage::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
