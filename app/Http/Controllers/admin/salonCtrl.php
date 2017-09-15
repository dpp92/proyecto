<?php

namespace App\Http\Controllers\admin;

use DB;
use App\models\salones;
use App\models\grados;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class salonCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mandamos a la vista de lista
        return view('app.admin.salones');

    }
    public function lista(){
        $salones = salones::all();
        $grados  = grados::all();//->pluck('nombre','id');
        return response()->json(["salones" => $salones, "grados" => $grados]);
        

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
        $salonNuevo = salones::create(array(
            'salon' => $request->salon,
            'grados_id' => $request->grado
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
        $salon = salones::find($request->id);
        $salon->grados_id = $request->grados_id;
        $salon->salon     = $request->salon;
        $salon->save();

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
        //
        salones::destroy($id);
        return response()->json(["succes" => true]);
    }
}
