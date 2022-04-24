<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = ['user_name','message'];

    public function scopeGetData($query)
    {
        return $this->timestamps . '　@' . $this->user_name . '　' . $this->message;
    }
    
    public function post()
    {
        return $this->belongdTo(Post::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'questioner');
        return $this->belongsTo(User::class, 'answerer');
    }
}
