<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function Restaurantes(){
        return $this->hasOne('App\Models\User','id','rest_id');
    }   
    protected $table = "products";
    protected $fillable = [
        'rest_id',
        'name',
        'price',
        'category',
        'Image',
        'description'
    ];
  
}
