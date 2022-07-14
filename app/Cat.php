<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $fillable=[
        'cat_type',
        'age','sex',
        'protected_place',
        'personality',
        'castration',
        'vaccination',
        'flears',
        'excretion',
        'sick',
        'problem',
        ];
        
    public function user(){
        return $this->belongsTo('App\User');
    }
}
