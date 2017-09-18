<?php

namespace SGE\models;

use Illuminate\Database\Eloquent\Model;

class alumno extends Model
{
    //
    protected $table = "alumnos";
    protected $fillable = ['id','dni_alumno','grado'];
}
