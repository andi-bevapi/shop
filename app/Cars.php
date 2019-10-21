<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    //
    protected $fillable = [
        'user_id', 'make', 'model','price','engine_size','is_active'
    ];

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }

    public function product(){
        return $this->hasMany('App\Product');
    }
    
}
