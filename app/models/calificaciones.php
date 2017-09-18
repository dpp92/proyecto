<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class calificaciones extends Model
{
    //
    protected $table = 'calificaciones';

    protected $fillable = ['id','calificacion','dni_alumnos','id_materias','id_docente'];
}
