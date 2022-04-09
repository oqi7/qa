<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    public function questioners()
    {
        return $this->hasMany(Comment::class, 'questioner');
    }
    
    public function answerers()
    {
        return $this->hasMany(Comment::class, 'answerer');
    }
    
    public function to()
    {
        return $this->hasMany(Comment::class, 'to');
    }
    
    public function from()
    {
        return $this->hasMany(Comment::class, 'from');
    }
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    
    public function posts()
    {
        return $this->morphToMany(Post::class, 'like');
    }
}
