<?php

namespace SGE\models;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    //
    protected $table = "users";
    protected $fillable = ['id','dni','nombre','apellidos','telefono','password'];
}
