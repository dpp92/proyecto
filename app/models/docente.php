<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class docente extends Model
{
    //
    protected $table = "docente";

    protected $fillable = ['id','dni_docente','titulo'];
}
