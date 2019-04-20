<?php

namespace IluminariasImperial\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $fillable=['name','slug','description','type_id','active','viewer_amount'];

   public function type(){
        return $this->belongsTo(Type::class);
   }

   public function colors(){
      return $this->belongsToMany(Color::class);
   }

   public function images(){
      return $this->hasMany(Image::class);
  }

  public function sizes(){
     return $this->belongsToMany(Size::class)->withPivot('width','height','width_unit','height_unit');
  }

}
