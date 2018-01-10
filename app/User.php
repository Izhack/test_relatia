<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    public $timestamps = false;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',

    ];

    public function events(){
        return $this->belongsToMany('App\Event','foreign_key');
    }
}
