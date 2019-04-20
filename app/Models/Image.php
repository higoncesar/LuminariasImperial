<?php

namespace IluminariasImperial\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['name','format','product_id','main'];
}
