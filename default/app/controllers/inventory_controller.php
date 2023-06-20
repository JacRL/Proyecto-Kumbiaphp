<?php
class InventoryController extends AppController
{
    public function index(){
        // opcion 1
        $Inventory = new Inventory();
        $this->inventory =  $Inventory->find();
    }
    /////////////////////////////////////////////////////////////////////////
    public function  registro(){
        //Registrar un  Actor
        if( Input::hasPost("inventory")){//preguntar si por post se envio libro
            $inventory = Input::post("inventory");    // recuperar valores de form
            if ((new Inventory ($inventory))->save()) {
                Flash::info("REGISTER INVENTORY SUCCESFUL!!");
            } else {
                Flash::error("NO REGISTER INVENTORY!!");
            }
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////////
    public function modificar($id){
        $this->inventory = (new Inventory())->find($id); //recuperar el registro
        if( Input::hasPost("inventory")){//verificar el envio del formulario
            $params = Input::post("inventory");//recuperar parametros
            $this->inventory->save($params);//actualizar el registor
        }
    }
}