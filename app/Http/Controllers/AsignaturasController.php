<?php

namespace App\Http\Controllers;

use DB;
use App\models\materias;
use App\models\docente;
use Illuminate\Http\Request;

class AsignaturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $materias = DB::table('materias')
        ->join('docente','docente.id','=','materias.id_docente')
        ->join('users','users.dni','=','docente.dni_docente')
        ->get();

        return view('app.admin.listmateria',[
            'materias' => $materias
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $docentes =  docente::join('users','docente.dni_docente','=','users.dni')
        ->pluck('users.nombre','docente.id')
        ->all();

        return view('app.admin.materianuevo',[
            'docentes' => $docentes
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $mate = new materias;

        $mate->create(['clave_materia'=> $request->clave_m,
                          'materia' => $request->materia,
                        'hora_inicio' => $request->horai,
                        'hora_fin' => $request->horaf,
                        'id_docente' => $request->docente ]);

            return redirect('materia');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $docentes =  docente::join('users','docente.dni_docente','=','users.dni')
        ->pluck('users.nombre','docente.id')
        ->all();

        $materias = materias::all()->where('clave_materia','=',$id)->first();
        return view('app.admin.editM',[
            'materias' => $materias,
            'docentes' => $docentes            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        DB::table('materias')
        ->where('clave_materia',$id)
        ->update([
            'materia' => $request->clave_m,
            'hora_inicio' => $request->horai,
            'hora_fin'  => $request->horaf,
            'id_docente' => $request->docente
            ]);

        return redirect('materia');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
   
}
