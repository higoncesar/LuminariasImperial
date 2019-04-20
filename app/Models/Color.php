<?php

namespace IluminariasImperial\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable=['name','code','slug'];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
