<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teach extends Model
{
    public function isTeach(Int $user_id, Int $post_id) 
    {
        return (boolean) $this->where('user_id', $user_id)->where('post_id', $post_id)->first();
    }
    
    public function storeTeach(Int $user_id, Int $post_id)
    {
        $this->user_id = $user_id;
        $this->post_id = $post_id;
        $this->save();

        return;
    }
    
    public function destroyTeach(Int $teach_id)
    {
        return $this->where('id', $teach_id)->delete();
    }
    
    public $timestamps = false;
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}