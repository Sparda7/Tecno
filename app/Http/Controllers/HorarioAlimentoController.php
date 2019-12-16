<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetalleAlimenticio;
use App\HorarioAlimento;
use DB;

class HorarioAlimentoController extends Controller
{
    public function index(Request $request)
    {
        // if(!$request->ajax()) return redirect('/');
        $buscar=$request->buscar;
        $table=HorarioAlimento::where('nombreha','like','%'.$buscar.'%')
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
    public function listar_alimento(Request $request)
    {
        // if(!$request->ajax()) return redirect('/');
        $id = $request->id;

        $detalle = DetalleAlimenticio::where('idordenalimenticio','=',$request->id)
        ->where('estado','=','1')
        ->with('alimento')        
        ->get();

        return ['detalle'=>$detalle];
    }
    public function listar_horario()
    {
        // if(!$request->ajax()) return redirect('/');
        $table=HorarioAlimento::get();
        foreach ($table as $value) {
        $value->detalle=DetalleAlimenticio::where('idordenalimenticio','=',$value->id)
        ->with('alimento')
        ->get();
        }

        return $table;
    }

    public function store(Request $request)
    {
        // if(!$request->ajax()) return redirect('/');
        DB::beginTransaction();
        try
        {
        $table= new HorarioAlimento();               
        $table->nombreha=$request->nombreha;        
        $table->save();

        $data=$request->data;
        

        foreach ($data as $key => $det) {
            $detalle=new DetalleAlimenticio();
            $detalle->idordenalimenticio=$table->id;
            $detalle->idalimento=$det['idalimento'];
            $detalle->estado='1';
            $detalle->save();
        }
        DB::commit();
        }
        catch (Exception $e)
        {
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
    public function update(Request $request)
    {
        DB::beginTransaction();
        try 
        {
            $table=HorarioAlimento::findOrfail($request->id);                                    
            $table->nombreha=$request->nombreha;       
            $table->save();
            $detalles = DetalleAlimenticio::where('idordenalimenticio','=',$table->id)->update(['estado'=>'0']);
            $data=$request->data;

            foreach ($data as $key => $det) {
                if($data['cantidad']!=0 && $data['cantidad']!=null){
                $detalle=DetalleAlimenticio::updateOrInsert(['idordenalimenticio' =>$table->id,'idalimento'=>$det['idalimento']],
                    ['cantidad'=>$det['cantidad'],'estado'=>'1']);
                }
                else{
                    $detalle=DetalleAlimenticio::updateOrInsert(['idordenalimenticio' =>$table->id,'idalimento'=>$det['idalimento']],
                    ['estado'=>'0']);
                }
            }
    
            DB::commit();
        } catch (Exception $e){
            DB::rollBack();
        }
                
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
        $table=HorarioAlimento::find($id);
        $table->delete();
    }
}
