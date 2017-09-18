<?php

namespace SGE\Http\Controllers\admin;
use DB;
use SGE\models\grados;
use SGE\models\docente;
use SGE\models\materias;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use SGE\Http\Controllers\Controller;

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
        $materias = DB::select("select 
                                    mat.id,
                                    mat.clave_materia,
                                    mat.materia,
                                    mat.hora_inicio,
                                    mat.hora_fin,
                                    mat.id_docente,
                                    mat.id_grado,
                                    dc.dni_docente,
                                    us.nombre,
                                    us.apellidos    
                                FROM 
                                    materias mat inner join docente dc on mat.id_docente = dc.id inner join users us on dc.dni_docente = us.dni");
        
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
      
        $materiaNuevo = materias::create(array(
            'clave_materia' =>  $request->clave,
            'materia'       =>  $request->materia,
            'hora_inicio'   =>  date("H:i:s",strtotime($request->horai)),
            'hora_fin'      =>  date("H:i:s",strtotime($request->horaf)),
            'id_docente'    =>  $request->docente,
            'id_grado'      =>  $request->grado

        )); 

        return response()->json(["succes"=> true]);

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
    public function edit(Request $request, $id)
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
        $materia = materias::find($request->id);
        $materia->clave_materia = $request->clave_materia;
        $materia->materia     = $request->materia;
        $materia->hora_inicio = $request->hora_inicio;
        $materia->hora_fin  = $request->hora_fin;
        $materia->id_docente = $request->id_docente;
        $materia->id_grado  = $request->id_grado;
        $materia->save();

        return response()->json(['succes' => true]);
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
