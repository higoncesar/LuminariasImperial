<?php

namespace IluminariasImperial\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $fillable=['client_name', 'client_phone', 'client_email', 'description','read'];
}
