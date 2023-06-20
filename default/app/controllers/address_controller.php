<?php
class AddressController extends AppController
{
    public function index(){
        // opcion 1
        $Address = new Address();
        $this->address =  $Address->find();
    }
    /////////////////////////////////////////////////////////////////////////
    public function  registro(){
        //Registrar
        if( Input::hasPost("address")){//preguntar si por post se envio libro
            $address = Input::post("address");    // recuperar valores de form
            if ((new Address($address))->save()) {
                Flash::info("Direccion registrada!!");
            } else {
                Flash::error("No fue posible registrar la dirección !!");
            }
        }
        if( Input::hasPost("alumnos")){//preguntar si por post se envio libro
            $alumnos = Input::post("alumnos");    // recuperar valores de form
            if ((new Alumnos($alumnos))->save()) {
                Flash::info("Alumno registrado");
            } else {
                Flash::error("No fue posible crear el registro del alumno");
            }
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////////
    public function modificar($id){
        $this->address = (new Address())->find($id); //recuperar el registro
        if( Input::hasPost("address")){//verificar el envio del formulario
            $params = Input::post("address");//recuperar parametros
            $this->address->save($params);//actualizar el registor
            Flash::info("Información actualizada!!");
        }
    }

}