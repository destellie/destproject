<?php

namespace App;
use Cache;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image',
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

    public function items(){
        return $this->hasmany('App\Items');
    }

    public function roles(){
        return $this->belongsToMany('App\Role');
    }
    public function isAdmin(){
        return $this->roles()->where('name','admin')->first();
    }
    public function hasAnyRole(array $roles){
        return $this->roles()->whereIn('name',$roles)->first();
    }
    
    //check if user is online

    public function isOnline(){
        return Cache::has('user-is-online-' . $this->id);
    }
   
}
