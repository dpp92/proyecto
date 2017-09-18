<?php

namespace SGE\models;

use Illuminate\Database\Eloquent\Model;

class materias extends Model
{
    //
    protected $fillable = ['id','clave_materia','materia','hora_inicio','hora_fin','id_docente','id_grado'];
}
