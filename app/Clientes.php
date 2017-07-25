<?php

namespace aacsa;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = "clientes";

    protected $fillable = ['id','nombre','apellido','direccion','email','telefono'];

    public function ranchos()
    {
    	return $this->hasMany('aacsa\Ranchos');
    }           
    		
}
