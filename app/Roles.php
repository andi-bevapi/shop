<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //
    protected $fillable = [
        'user_id', 'is_admin'
    ];

    public function users(){
        return $this->BelongsTo('App\User');
    }
}
