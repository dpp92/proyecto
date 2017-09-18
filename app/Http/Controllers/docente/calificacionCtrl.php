<?php

namespace SGE\Http\Controllers\docente;

use DB;
use SGE\models\calificaciones;
use Illuminate\Http\Request;
use SGE\Http\Controllers\Controller;

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
        
            $calificaciones = new calificaciones;
            $calificaciones->calificacion = $request->cal;
            $calificaciones->dni_alumnos   = $request->dni_alumno;
            $calificaciones->id_materias  = $request->id_materia;
            $calificaciones->id_docente   = $request->dni_docente;
            $calificaciones->save();
        
    }

    public function listo ($dni_docente){
        $listos = DB::table('calificaciones as cl')
        ->join('users as usr','usr.dni','=','cl.dni_alumnos')
        ->join('materias as mt','mt.id','=','cl.id_materias')
        ->join('grados as gr','gr.id','=','mt.id_grado')
        ->select('cl.dni_alumnos','usr.nombre','usr.apellidos','cl.calificacion','gr.id','gr.grado','mt.clave_materia','mt.materia')
        ->where('cl.id_docente','=',$dni_docente)
        ->get();

        return response()->json(["datos"=>$listos]);
    }
}
