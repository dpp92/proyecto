<?php

namespace App\Http\Controllers\docente;

use DB;
use App\models\calificaciones;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class calificacionCtrl extends Controller
{
    //
    /*
    * Relacion de alumnos que tiene a su cargo el docente
    * por materia que tenga a su cargo
    */

    public function califica($id_docente){


        $alumnos = DB::table('materias as mat')
            ->join('docente as dc', 'mat.id_docente', '=','dc.id')
            ->join('alumnos as al','mat.id_grado','=','al.grado')
            ->join('users as usr','usr.dni','=','al.dni_alumno')
            ->join('grados as gr','gr.id','=','mat.id_grado')
            ->select('al.dni_alumno','usr.nombre','usr.apellidos','mat.clave_materia','mat.materia','mat.id_grado','dc.dni_docente','gr.grado','mat.id as id_materia')
            ->where('dc.dni_docente','=',$id_docente)
            ->get();
        ;

        $materias = DB::table('materias as mat')
       ->join('docente as dc', 'mat.id_docente', '=','dc.id')
       ->join('grados as gr','gr.id','=','mat.id_grado')
        ->select('mat.materia','gr.grado','mat.id_docente')
        ->where('dc.dni_docente','=',$id_docente)
        ->get();

        return response()->json(['alumnos'=>$alumnos,'matgr'=>$materias]);

    }

    public function calificar(Request $request){
        
        // $calif = calificaciones::insert(json_decode($request));
       
        // foreach ($request as $key => $value) {
        //     # code...
        //     $calificaciones = new calificaciones;
        //     $calificaciones->calificacion = $key->cal;
        //     $calificaciones->dni_alumnos   = $key->dni_alumno;
        //     $calificaciones->id_materias  = $key->id_materia;
        //     $calificaciones->id_docente   = $key->dni_docente;
        //     $calificaciones->save();
        // }

    }
}
