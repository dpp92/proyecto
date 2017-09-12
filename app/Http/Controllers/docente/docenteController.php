<?php

namespace App\Http\Controllers\docente;


use DB;
use Hash;
use App\User;
use App\models\materias;
use App\models\docente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class docenteController extends Controller
{

    private $tipoUsuario = '2';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $listDocente = DB::table('users')
        ->leftjoin('docente','docente.dni_docente','=','users.dni')
        ->where('users.tipo','=',$this->tipoUsuario)
        ->get();

        $listMaterias = materias::all();

       return view('app.admin.listdocente',[ 
                    'lista' => $listDocente,
                    'lmat'  => $listMaterias
                ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$materias = materias::all()->pluck('materia','clave_materia');
        return view('app.admin.docentenuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validamos los requests

        $this->validate($request,[
            'dni' => 'required|unique:users|min:6',
            'nombre' => 'min:3',
            'password' => 'required|min:5',
            'apellidos' => 'required| min:3'
            ]);

        $usuarioN = new User;
        $usuarioN->create(['dni'=> $request->dni,
                          'nombre' => $request->nombre,
                        'apellidos' => $request->apellidos,
                        'telefono' => $request->telefono,
                        'tipo' => $this->tipoUsuario ,
                        'password' => Hash::make($request->password)]);

         $docenteN = new docente;
        $docenteN->create(['dni_docente' => $request->dni,
                            'titulo' => $request->titulo]);

        return redirect('docente');
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
     * Muestra la lista de usuario que tiene la escuela
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $idP = DB::table('users')
        ->join('docente','docente.dni_docente','=','users.dni')
        ->where('users.dni', '=',$id)
        ->first();
        return view('app.admin.editD',[
                    'idP' => $idP 
            ]);
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
        $this->validate($request,[
            'nombre' => 'min:3',
            'apellidos' => 'min:3'
            ]);

        DB::table('users')
        ->where('dni',$id)
        ->update([      'nombre' => $request->nombre,
                        'apellidos' => $request->apellidos,
                        'telefono' => $request->telefono,
                        'tipo' => $this->tipoUsuario ]);

        DB::table('docente')
        ->where('dni_docente',$id)
        ->update([
                  'titulo' => $request->titulo]);
        return redirect('docente');
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
        DB::table('docente')
        ->where('dni_docente','=',$id)
        ->delete();

        DB::table('users')
        ->where('dni','=',$id)
        ->delete();

        return redirect('docente');

    }

   
}
