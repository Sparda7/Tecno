<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        // if(!$request->ajax()) return redirect('/');
        $buscar=$request->buscar;
        $table=Menu::where('nombre','like','%'.$buscar.'%')
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
    public function listar_alimento(Request $request)
    {
        // if(!$request->ajax()) return redirect('/');
        $id = $request->id;

        $detalle = DetalleAlimento::where('id_menu','=',$request->id)
        ->where('estado','=','1')
        ->with('alimento')        
        ->get();

        return ['detalle'=>$detalle];
    }
    public function listar_menu()
    {
        // if(!$request->ajax()) return redirect('/');
        $table=Menu::get();
        foreach ($table as $value) {
        $value->detalle=DetalleAlimento::where('id_menu','=',$value->id)
        ->with('alimento')
        ->get();
        }

        return $table;
    }
    public function store(Request $request)
    {
        // if(!$request->ajax()) return redirect('/');
        DB::beginTransaction();
        try{    
        $table= new Menu();
        $table->nombre=$request->nombre;
        $table->totalcaloria=$request->total_caloria;
        $table->totalgrasa=$request->total_grasa;
        $table->totalcarbohidrato=$request->total_carbohidrato;
        $table->totalproteina=$request->total_proteina;
        $table->save();

        $data=$request->data;

        foreach ($data as $key => $det) {
            $detalle=new DetalleAlimento();
            $detalle->idmenu=$table->id;
            $detalle->idalimento=$det['idalimento'];
            $detalle->cantidad=$det['cantidad'];
            $detalle->subcaloria=$det['subcaloria'];
            $detalle->subgrasa=$det['subgrasa'];
            $detalle->subcarbohidrato=$det['subcarbohidrato'];
            $detalle->subproteina=$det['subproteina'];
            $detalle->estado='1';
            $detalle->save();
        }

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
    public function update(Request $request)
    {
        // if(!$request->ajax()) return redirect('/');
        DB::beginTransaction();
        try{    
            $table=Menu::findOrfail($request->id);
            $table->nombre=$request->nombre;
            $table->totalcaloria=$request->total_caloria;
            $table->totalgrasa=$request->total_grasa;
            $table->totalcarbohidrato=$request->total_carbohidrato;
            $table->totalproteina=$request->total_proteina;
            $table->save();
            $detalles = DetalleAlimento::where('idmenu','=',$table->id)->update(['estado'=>'0']);

        $data=$request->data;
        
        foreach ($data as $key => $det) {
    
            $detalle=DetalleAlimento::updateOrInsert(['idmenu' =>$table->id,'idalimento'=>$det['idalimento']],
                ['cantidad'=>$det['cantidad'],'subcaloria'=>$det['subcaloria'],'subgrasa'=>$det['subgrasa'],
                'subcarbohidrato'=>$det['subcarbohidrato'],'subproteina'=>$det['subproteina'],
                'estado'=>'1']);
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
        $table=Menu::find($id);
        $table->delete();
    }
}