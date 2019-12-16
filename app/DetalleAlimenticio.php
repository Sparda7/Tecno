<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleAlimenticio extends Model
{
    public $timestamps=false;
    public function alimento()
    {
        return $this->belognsTo('app\Alimento','idalimento');
    }
}
