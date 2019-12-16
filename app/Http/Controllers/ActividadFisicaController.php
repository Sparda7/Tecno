<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActividadFisica;
class ActividadFisicaController extends Controller
{
    // public function index(){
    //     $table=ActividadFisica::all();
    //     return $table;
    //}
    
    public function index(Request $request)
    {
        // if(!$request->ajax()) return redirect('/');
        $buscar=$request->buscar;
        $table=ActividadFisica::where('nombre','like','%'.$buscar.'%')
        ->orderBy('id','desc')->paginate(10);
        return [
            'pagination' => [
                'total'        => $table->total(),
                'current_page' => $table->currentPage(),
                'per_page'     => $table->perPage(),
                'last_page'    => $table->lastPage(),
                'from'         => $table->firstItem(),
                'to'           => $table->lastItem(),
            ],
            'table' => $table
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if(!$request->ajax()) return redirect('/');
        $table= new ActividadFisica();                
        $table->nombre=$request->nombre;        
        $table->descripcion=$request->descripcion;
        $table->calorias=$request->calorias;
        $table->save();
    }
    public function select(Request $request)
    {
        $buscar=$request->buscar;
        $table=ActividadFisica::where('nombre','like','%'.$buscar.'%')->take(10)->get();
        return ['table'=>$table];

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $table=ActividadFisica::findOrfail($request->id);      
        $table->nombre=$request->nombre;        
        $table->descripcion=$request->descripcion;
        $table->calorias=$request->calorias;
        $table->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if(!$request->ajax()) return redirect('/');
        $table=ActividadFisica::find($id);
        $table->delete();
    }
   
    

}
