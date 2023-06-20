<?php
class PaymentController extends AppController
{
    public function index(){
        $this->payment= (new Payment())->find();
    }
    /////////////////////////////////////////////////////////////////////////
    public function  registro(){
        if( Input::hasPost("payment")){//preguntar si por post se envio libro
            $payment = Input::post("payment");    // recuperar valores de form
            if ((new Payment($payment))->save()) {
                Flash::info("SUCCESSFUL REGISTRATION!!");
            } else {
                Flash::error("REGISTRATION COULD NOT BE MADE!!");
            }
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////////
    public function modificar($id){
        $this->payment = (new Payment())->find($id); //recuperar el registro
        if( Input::hasPost("payment")){//verificar el envio del formulario
            $params = Input::post("payment");//recuperar parametros
            $this->payment->save($params);//actualizar el registor
            Flash::info("SUCCESSFUL MODIFY.!!");
        }
    }
    /////////////////////////
    public function eliminar($id)
    {
        if ((new Payment)->delete((int) $id)) {
                Flash::valid('Operación exitosa');
        } else {
                Flash::error('Falló Operación');
        }
        //enrutando por defecto al index del controller
        return Redirect::to();
    }
    //////////////////////////////////
    public function  ver($id){
        $this->payment = (new Payment())->find_all_by("id",$id); //recuperar el registro
    }
}