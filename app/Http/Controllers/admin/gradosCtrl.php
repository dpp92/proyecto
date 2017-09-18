<?php

namespace SGE\Http\Controllers\admin;

use SGE\models\grados;
use Illuminate\Http\Request;
use SGE\Http\Controllers\Controller;

class gradosCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('app.admin.grado');
    }

    public function lista(){
    	$grados = grados::all();

    	return response()->json(["grados" => $grados]);
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
        
        $grado = grados::create(array(
        		'grado' => $request->grado
        ));

        return $request->grado;

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
        $grado = grados::find($id);
        $grado->grado = $request->grado;
        $grado->save();

        return response()->json(["succes"=>true]);
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
        $gDel = grados::destroy($id);

        return response()->json(['succes'=>true]);
    }
}
