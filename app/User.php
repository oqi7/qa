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
        'name', 'email', 'password','profile_image'
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
        return $this->hasMany('App\Like');
    }
    
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    
    public function likes() 
    {
        return $this->hasMany('App\Like')
            ->where('model', self::class);;
    }
    
    public function teaches() 
    {
        return $this->hasMany('App\Teach')
            ->where('model', self::class);;
    }
    
    public function getAllUsers(Int $user_id)
    {
        return $this->Where('id', '<>', $user_id)->paginate(10);
    }
    
    public function updateProfile(Array $params)
    {
        if (isset($params['profile_image'])) {
            $file_name = $params['profile_image']->store('public/profile_image/');

            $this::where('id', $this->id)
                ->update([
                    'name'          => $params['name'],
                    'age'          => $params['age'],
                    'profile_image' => basename($file_name),
                    'email'         => $params['email'],
                ]);
        } else {
            $this::where('id', $this->id)
                ->update([
                    'name'          => $params['name'],
                    'age'          => $params['age'],
                    'email'         => $params['email'],
                ]); 
        }

        return;
    }
}
