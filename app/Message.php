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
    
    protected $fillable = ['user_name','user_identifier','message'];

    public function scopeGetData($query)
    {
        return $this->created_at . '　@' . $this->user_name . '　' . $this->message;
    }
}
