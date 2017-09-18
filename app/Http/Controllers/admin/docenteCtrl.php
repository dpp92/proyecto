<?php

namespace App\Http\Controllers\admin;

use DB;
use App\models\users;
use App\models\docente;
use App\models\materias;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class docenteCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('app.admin.docente');
    }

    public function lista()
    {
        //
        $docentes = DB::select(" 
            select
                usr.id,
                usr.dni,
                usr.nombre,
                usr.apellidos,
                usr.telefono,
                doc.id as id_doc,
                doc.titulo
            FROM 
                users usr inner join docente doc on usr.dni = doc.dni_docente
            WHERE 
                usr.tipo = '2'
                 ");

        return response()->json(["docentes" => $docentes]);

    }

    public function home(){
        return view('app.docente.docente');
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
        $user->tipo = 2;

        $docente = new docente;
        $docente->dni_docente = $request->dni;
        $docente->titulo      = $request->titulo;

        $user->save();
        $docente->save();

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
           $user->password = $request->password;
        }
        $user->telefono = $request->telefono;
        $user->tipo = 2;

        $docente = docente::find($request->id_doc);
        $docente->dni_docente = $request->dni;
        $docente->titulo      = $request->titulo;

        $user->save();
        $docente->save();
        // $user->save();

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
        $docente = docente::where('dni_docente',$id);
        $docente->delete();

        $user = users::where('dni',$id);

        $user->delete();

        return response()->json(['succes'=>true]);
    }
}
