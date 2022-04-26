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
        return $this->belongsTo('App\User');
    }
    
    public function directmessages()
    {
        return $this->hasMany(DirectMessage::class);
    }
    
    public function likes() {
        return $this->hasMany('App\Like');
    }
    
    public function teachs() {
        return $this->hasMany('App\Teach');
    }
    
    public function getUserTimeLine(Int $user_id)
    {
        return $this->where('user_id', $user_id)->orderBy('created_at', 'DESC');
    }

    public function getPostCount(Int $user_id)
    {
        return $this->where('user_id', $user_id)->count();
    }
    
    public function postStore(Int $user_id, Array $data)
    {
        $this->user_id = $user_id;
        $this->body = $data['body'];
        $this->save();

        return;
    }
}
