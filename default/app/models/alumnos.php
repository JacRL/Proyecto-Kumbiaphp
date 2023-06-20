<?php
class Alumnos extends ActiveRecord{
    protected function initialize(){
        $this->validates_presence_of("no_control" );
        $this->validates_length_of("no_control", "minumum: 8", "too_short: El numero de control debe de ser de 8 caracteres");
        $this->validates_email_in('email', 'message: Debe escribir un <b>correo electronico</b> válido');
    }
    public $debug = false;//activar true
}