<?php
class LanguajeController extends AppController
{
    public function index(){
        // opcion 1
        $Languaje = new Languaje();
        $this->languaje =  $Languaje->find();
    }
    /////////////////////////////////////////////////////////////////////////
    public function  registro(){
        //Registrar
        if( Input::hasPost("languaje")){//preguntar si por post se envio libro
            $languaje = Input::post("languaje");    // recuperar valores de form

            if ((new Languaje($languaje))->save()) {
                Flash::info("SUCCESSFUL REGISTRATION!!");
            } else {
                Flash::error("REGISTRATION COULD NOT BE MADE!!");
            }
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////////
    public function modificar($id){
        $this->languaje = (new Languaje())->find($id); //recuperar el registro
        if( Input::hasPost("languaje")){//verificar el envio del formulario
            $params = Input::post("languaje");//recuperar parametros
            $this->languaje->save($params);//actualizar el registor
            Flash::info("SUCCESSFUL MODIFICATION");
        }
    }
}