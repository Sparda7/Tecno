<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
class PerfilController extends Controller
{
    // public function index(){
    //     $table=Perfil::all();
    //     return $table;
    // }

    public function index(Request $request)
    {
        // if(!$request->ajax()) return redirect('/');
        $buscar=$request->buscar;
        $table=Perfil::where('nombre','like','%'.$buscar.'%')
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
        $table= new Perfil();        
        $table->nombre=$request->nombre;
        $table->paterno=$request->paterno;       
        $table->materno=$request->materno;
        $table->ci=$request->ci;
        $table->edad=$request->edad;
        $table->altura=$request->altura;
        $table->peso=$request->peso;
        $table->sexo=$request->sexo;
        $table->usuario=$request->usuario;
        $table->contraseña=$request->contraseña;
        $table->tipo=$request->tipo;
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
        $table=Perfil::findOrfail($request->id);        
        $table->nombre=$request->nombre;
        $table->paterno=$request->paterno;       
        $table->materno=$request->materno;
        $table->ci=$request->ci;
        $table->edad=$request->edad;
        $table->altura=$request->altura;
        $table->peso=$request->peso;
        $table->sexo=$request->sexo;
        $table->usuario=$request->usuario;
        $table->contraseña=$request->contraseña;
        $table->tipo=$request->tipo;
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
        $table=Perfil::find($id);
        $table->delete();
    }

}
