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
    
    public function cats(){
        return $this->hasMany('App\Cat');
    }
    
    public function favorites(){
        return $this->belongsToMany('App\Cat','cat_user','user_id','cat_id');
    }
    
    public function add_favorite($catId){
        $exist=$this->is_favorite($catId);
        
        if($exist){
            return false;
        }else{
            $this->favorites()->attach($catId);
            return true;
        }
    }
    
    public function unfavorite($catId){
        $exist=$this->is_favorite($catId);
        
        if($exist){
            $this->favorites()->detach($catId);
            return true;
        }else{
            return false;
        }
    }
    
    public function is_favorite($catId){
        return $this->favorites()->where('cat_id',$catId)->exists();
    }
}
