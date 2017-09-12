<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class materias extends Model
{
    //

    protected $fillable =["clave_materia",
					"materia",
					"hora_inicio",
					"hora_fin",
					"id_docente"];
}


