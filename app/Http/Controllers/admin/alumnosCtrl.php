<?php

namespace App\Http\Controllers\admin;


use DB;
use Hash;
use App\models\users;
use App\models\alumno;
use App\models\grados;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class alumnosCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('app.admin.alumno');
    }

    public function lista(){
        $alumnos = DB::select(" 
            select
                usr.id,
                usr.dni,
                usr.nombre,
                usr.apellidos,
                usr.telefono,
                alu.id as id_alu,
                alu.grado
            FROM 
                users usr inner join alumnos alu on usr.dni = alu.dni_alumno
            WHERE 
                usr.tipo = '1'
                 ");
        $grados = grados::all();
        return response()->json(["alumnos" => $alumnos,'grados' => $grados]);
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
        //
        $user =  new users;
        $user->dni = $request->dni;
        $user->nombre = $request->nombre;
        $user->apellidos = $request->apellidos;
        $user->password = Hash::make($request->password);
        $user->telefono = $request->telefono;
        $user->tipo = 1;

        $alumnos = new alumno;
        $alumnos->dni_alumno = $request->dni;
        $alumnos->grado      = $request->grado;

        $user->save();
        $alumnos->save();

        return response()->json(['succes'=>true]);
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
        $user =  users::find($request->id);
        $user->dni = $request->dni;
        $user->nombre = $request->nombre;
        $user->apellidos = $request->apellidos;

        if($request->password != null){
           $user->password = Hash::make($request->password);
        }
        $user->telefono = $request->telefono;
        $user->tipo = 1;

        $alumnos = alumno::find($request->id_alu);
        $alumnos->dni_alumno = $request->dni;
        $alumnos->grado      = $request->grado;

        $user->save();
        $alumnos->save();
       

        return response()->json(['succes'=>true]);
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
        $alumno = alumno::where('dni_alumno',$id);
        $alumno->delete();

        $user = users::where('dni',$id);
        $user->delete();

        return response()->json(['succes'=>true]);
    }
}
