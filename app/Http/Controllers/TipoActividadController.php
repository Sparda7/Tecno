<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoActividad;
class TipoActividadController extends Controller
{
    //  public function index(){
    //     $table=TipoActividad::all();
    //     return $table;
    // }

    public function index(Request $request)
    {
        // if(!$request->ajax()) return redirect('/');
        $buscar=$request->buscar;
        $table=TipoActividad::where('tipoactividad','like','%'.$buscar.'%')
        // ->select('tipoactividad','tipodescripcion')
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
        $table= new TipoActividad();
        $table->idactividadfisica=$request->idactividadfisica;                        
        $table->tipoactividad=$request->tipoactividad;                                                                            
        $table->save();
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
        $table=TipoActividad::findOrfail($request->id);
        $table->idactividadfisica=$request->idactividadfisica;                       
        $table->tipoactividad=$request->tipoactividad;                                         
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
        $table=TipoActividad::find($id);
        $table->delete();
    }

}
