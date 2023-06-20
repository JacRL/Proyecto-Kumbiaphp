<?php
//NOMBRE DE LA TABLA DE LA BD, la primera letra va en Mayuscula
class Productos extends ActiveRecord{
    protected function initialize(){
        $this->validates_presence_of('nombre', 'message: Debe escribir un <b>nombre</b> para el producto');
        $this->validates_length_of("descripcion", "minumum: 10", "too_short: Descripcion incompleta");

    }
    public $debug = false;//activar true

}