<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dieta;

class DietaController extends Controller
{
    // public function index(){
    //     $table=Dieta::all();
    //     return $table;
    // }

    public function index(Request $request)
    {
        // if(!$request->ajax()) return redirect('/');
        $buscar=$request->buscar;
        $table=Dieta::where('id_perfil','like','%'.$buscar.'%')
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
        $table= new Dieta();        
        //$table->id_perfil=auth()->id;                       
        $table->fechainicio=$request->fechainicio;
        $table->fechafin=$request->fechafin;
        $table->caloriasdiarias=$request->caloriasdiarias;
        $table->pesominimo=$request->pesominimo;
        $table->pesoideal=$request->pesoideal;
        $table->pesomaximo=$request->pesomaximo;
        $table->imc=$request->imc;        
        $table->save();
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
        $table=Dieta::findOrfail($request->id);       
        $table->id_perfil=auth()->id;                       
        $table->fechainicio=$request->fechainicio;
        $table->fechafin=$request->fechafin;
        $table->caloriasdiarias=$request->caloriasdiarias;
        $table->pesominimo=$request->pesominimo;
        $table->pesoideal=$request->pesoideal;
        $table->pesomaximo=$request->pesomaximo;
        $table->imc=$request->imc;        
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
        $table=Dieta::find($id);
        $table->delete();
    }

}
