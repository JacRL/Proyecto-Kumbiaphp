<?php
class Libros extends ActiveRecord{

    protected function initialize(){
        $this->validates_presence_of("titulo");
        //$this->validates_length_of("titulo", "minumum: 5", "too_short: El titulo debe tener al menos 5 caracteres");
        $this->validates_numericality_of("paginas");
        $this->validates_uniqueness_of("titulo");
    }

    public $debug = false;//activar true
}