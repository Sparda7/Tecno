<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoActividad extends Model
{    
    protected $fillable=['idactividadfisica','tipoactividad'];
    public $timestamps = false;
    protected $appends = ['actividadfisica'];

    public function actividadfisica (){
        return $this->belongsTo('App\ActividadFisica','idactividadfisica');
        }

        public function getActividadFisicaAttribute(){
            return $this->actividadfisica()->first(['nombre'])->nombre;
        } 
    
}   
