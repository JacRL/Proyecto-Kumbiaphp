<?php
class CountryController extends AppController
{
    public function index(){
        // opcion 1
        $Country = new Country();
        $this->country =  $Country->find();
    }
    /////////////////////////////////////////////////////////////////////////
    public function  registro(){
        //Registrar
        if( Input::hasPost("country")){//preguntar si por post se envio libro
            $country = Input::post("country");    // recuperar valores de form
            if ((new Country($country))->save()) {
                Flash::info("País registrado!!");
            } else {
                Flash::error("No fue posible registrar el país !!");
            }
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////////
    public function modificar($id){
        $this->country = (new Country())->find($id); //recuperar el registro
        if( Input::hasPost("country")){//verificar el envio del formulario
            $params = Input::post("country");//recuperar parametros
            $this->country->save($params);//actualizar el registor
        }
    }
}