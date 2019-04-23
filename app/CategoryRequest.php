<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoryRequest extends Model
{
    protected $fillable = ['user_id' , 'category_id' , 'latitude' , 'longitude' , 'radius'];
}
