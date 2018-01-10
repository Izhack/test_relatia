<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    public $timestamps = false;

    protected $fillable = [
        'status',
    ];

    public function users(){
        return $this->belongsToMany('App\User','foreign_key');
    }
}
