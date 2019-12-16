<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dieta;
use App\User;
use DB;

class DietaController extends Controller
{
    // public function index(){
    //     $table=Dieta::all();
    //     return $table;
    // }

    public function index(Request $request)
    {
        // if(!$request->ajax()) return redirect('/');
        $table=Dieta::where('id_usuario','=',auth()->id())
        ->orderBy('id','desc')
        ->limit(1)
        ->get();
        return $table;
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
         DB::beginTransaction();
         try {
        // if(!$request->ajax()) return redirect('/');
        $table= new Dieta();        
        $table->idperfil=auth()->id();                       
        $table->fechainicio=$request->fecha_inicio;
        $table->fechafin=$request->fecha_fin;
        $table->caloriasdiarias=$request->calorias;
        $table->pesoideal=$request->peso_ideal;
        $table->imc=$request->imc;
        $table->tipo=$request->tipo;
        $table->save();

        $user=User::findOrFail(auth()->id());
        $user->fecha_nacimiento=$request->fecha_nacimiento;
        $user->altura=$request->altura;
        $user->peso=$request->peso;
        $user->sexo=$request->sexo;
        $user->estado='1';
        $user->save();

        DB::commit();
    } catch (Exception $e){
        DB::rollBack();
    }
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
        $table->fechainicio=$request->fecha_inicio;
        $table->fechafin=$request->fecha_fin;
        $table->caloriasdiarias=$request->calorias;
        $table->pesoideal=$request->peso_ideal;
        $table->imc=$request->imc;
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
        $table=Dieta::find($id);
        $table->delete();
    }

}
