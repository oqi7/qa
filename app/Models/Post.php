<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function directmessages()
    {
        return $this->hasMany(DirectMessage::class);
    }
    
    public function users()
    {
        return $this->morphToMany(User::class, 'like');
    }
}
