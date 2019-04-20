<?php

namespace IluminariasImperial\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = ['name','slug'];

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('width','height','width_unit','height_unit');
    }
}
