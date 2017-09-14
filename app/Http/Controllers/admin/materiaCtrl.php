<?php

namespace App\Http\Controllers\admin;
use DB;
use App\models\grados;
use App\models\docente;
use App\models\materias;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class materiaCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con el index redirigimos a la pantalla de materias 

        return view('app.admin.materia');
    }

    public function lista(){

        $grados  = grados::all();//->pluck('nombre','id');
        $docente = DB::table('users')->join('docente','dni','=','docente.dni_docente')->get();
        $materias = materias::all();
        return response()->json(["materias" => $materias, "grados" => $grados,"docente" => $docente]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
      
        //$nMateria = materias::create
        // $materiaNuevo = materias::create(array(
        //     'clave_materia' =>  $request->clave,
        //     'materia'       =>  $request->materia,
        //     'hora_inicio'   =>  $request->horai,
        //     'hora_fin'      =>  $request->horaf,
        //     'id_docente'    =>  $request->docente,
        //     'id_grado'      =>  $request->grado

        // )); 

        // return response()->json(["succes"=> true]);

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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //primero eliminamos al usuario que este en la materia

        DB::table('calificaciones')
            ->where('id_materias',  $id)
            ->delete();

        materias::destroy($id);
        return response()->json(["succes" => true]);

    }
}
