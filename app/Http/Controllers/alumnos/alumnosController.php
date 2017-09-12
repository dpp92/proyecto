<?php

namespace App\Http\Controllers\alumnos;

use DB;
use Hash;
use App\User;
use App\models\grados;
use App\models\alumnos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;



class alumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    private $tipoUsuario = '1';

    public function index()
    {
        //
        return 'hola we';

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //recuperar los grados disponibles
        $grados = grados::all()->pluck('nombre','id');

        return view('app.admin.alumnonuevo',[
            'grados' => $grados]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Insertamos los valores a tabla alumnos


        $this->validate($request,[
            'dni' => 'required|unique:users|min:6',
            'nombre' => 'min:3',
            'password' => 'required|min:5',
            'apellidos' => 'required| min:3',
            'grado' => 'required'
            ]);


         $usuarioN = new User;
        $usuarioN->create(['dni'=> $request->dni,
                          'nombre' => $request->nombre,
                        'apellidos' => $request->apellidos,
                        'telefono' => $request->telefono,
                        'tipo' => $this->tipoUsuario ,
                        'password' => Hash::make($request->password)]);
        

        $alumnoN = new alumnos;
        $alumnoN->create(['dni_alumno' => $request->dni,
                          'grado' => $request->grado ]);

        return route('alumno.show',$request->dni);
       

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
        return ' se ha creado jeje '. $id;
        
    }

    /**
     * Muestra la lista de usuario que tiene la escuela
     */
    public function lista()
    {
        //
        
       // $listAlumno = User::all()
       // ->join('alumnos','dni','=','users.dni')
       // ->where('tipo','=',$this->tipoUsuario);

        $listAlumno = DB::table('users')
        ->leftjoin('alumnos','alumnos.dni_alumno','=','users.dni')
        ->where('users.tipo','=','1')
        ->get();

       return view('app.admin.listalumno',[ 
                    'lista' => $listAlumno
                ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Editar alumno
        $editAlumno = User::all()->where('dni_alumno','=',$id)->get();

        // return view('app.admin.editar',[
        //     'alumno' => $editAlumno
        //     ]);
        $

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
        //
    }
}
