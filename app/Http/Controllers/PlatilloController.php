<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Platillo;
class PlatilloController extends Controller
{
    // public function index(){
    //     $table=Platillo::all();
    //     return $table;
    // }

    public function index(Request $request)
    {
        // if(!$request->ajax()) return redirect('/');
        $buscar=$request->buscar;
        $table=Platillo::where('nombre','like','%'.$buscar.'%')
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
        $table= new Platillo();        
        $table->nombre=$request->nombre;
        $table->descripcion=$request->descripcion;
        $table->racion=$request->racion;
        $table->caloria=$request->caloria;       
        $table->grasa=$request->grasa;        
        $table->carbohidrato=$request->carbohidrato;
        $table->proteina=$request->proteina;
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
        $table=Platillo::findOrfail($request->id);        
        $table->nombre=$request->nombre;
        $table->descripcion=$request->descripcion;
        $table->racion=$request->racion;
        $table->caloria=$request->caloria;       
        $table->grasa=$request->grasa;        
        $table->carbohidrato=$request->carbohidrato;
        $table->proteina=$request->proteina;
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
        $table=Platillo::find($id);
        $table->delete();
    }

}
