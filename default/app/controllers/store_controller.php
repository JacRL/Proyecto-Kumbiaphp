<?php
class StoreController extends AppController
{
    public function index(){
        $this->store= (new Store())->find();
    }
    /////////////////////////////////////////////////////////////////////////
    public function  registro(){
        if( Input::hasPost("store")){//preguntar si por post se envio libro
            $store = Input::post("store");    // recuperar valores de form


            if ((new Store($store))->save()) {
                Flash::info("SUCCESSFUL REGISTRATION!!");
            } else {
                Flash::error("REGISTRATION COULD NOT BE MADE!!");
            }
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////////
    public function modificar($id){
        $this->store = (new Store())->find($id); //recuperar el registro
        if( Input::hasPost("store")){//verificar el envio del formulario
            $params = Input::post("store");//recuperar parametros
            $this->store->save($params);//actualizar el registor
            Flash::info("SUCCESSFUL MODIFY.!!");
        }
    }
}