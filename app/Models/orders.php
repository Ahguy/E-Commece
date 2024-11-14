<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    //
    public function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function products(){
        return $this->hasOne('App\Models\Products','id','product_id');
    }
}
