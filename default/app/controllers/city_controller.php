<?php
class CityController extends AppController
{
    public function index(){
        // opcion 1
        $City = new City();
        $this->city=$City->find();
    }
    /////////////////////////////////////////////////////////////////////////
    public function  registro(){
        //Registrar
        if( Input::hasPost("city")){//preguntar si por post se envio libro
            $city = Input::post("city");    // recuperar valores de form

            if ((new City($city))->save()) {
                Flash::info("Registered city!!");
            } else {
                Flash::error("City no registered !!");
            }
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////////
    public function modificar($id){
        $this->city = (new City())->find($id); //recuperar el registro
        if( Input::hasPost("city")){//verificar el envio del formulario
            $params = Input::post("city");//recuperar parametros
            $this->city->save($params);//actualizar el registor
            Flash::info("Modified city");
        }
    }
}