<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurantes extends Model
{
    protected $table = "restaurant";
    protected $fillable = [
        'province_id',
        'name',
        'fistname ',
        'lastname',
        'phone',
        'email',
        'Image'
    ];
}
