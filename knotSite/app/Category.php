<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories'; //spelling is different

    public function posts(){
        return $this->hasMany('App\Post');
    }
}
