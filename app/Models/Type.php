<?php

namespace IluminariasImperial\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable=['name','slug'];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
