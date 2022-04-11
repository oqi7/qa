<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
    'title',
    'body'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function directmessages()
    {
        return $this->hasMany(DirectMessage::class);
    }
}
