<?php
class StaffController extends AppController
{
    public function index(){
        $this->staff= (new Staff())->find();
    }
    /////////////////////////////////////////////////////////////////////////
    public function  registro(){
        if( Input::hasPost("staff")){//preguntar si por post se envio libro
            $staff = Input::post("staff");    // recuperar valores de form
            if ((new Staff($staff))->save()) {
                Flash::info("SUCCESSFUL REGISTRATION!!");
            } else {
                Flash::error("REGISTRATION COULD NOT BE MADE!!");
            }
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////////
    public function modificar($id){
        $this->staff = (new Staff())->find($id); //recuperar el registro
        if( Input::hasPost("staff")){//verificar el envio del formulario
            $params = Input::post("staff");//recuperar parametros
            $this->staff->save($params);//actualizar el registor
            Flash::info("SUCCESSFUL MODIFICATION!!");
        }
    }
}