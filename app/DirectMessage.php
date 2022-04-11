<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirectMessage extends Model
{
    public function post()
    {
        return $this->belongdTo(Post::class);
    }
    
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'questioner');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'answerer');
    }
}
