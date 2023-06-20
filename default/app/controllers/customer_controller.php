<?php
class CustomerController extends AppController
{
    public function index(){
        // opcion 1
        $Customer = new Customer();
        $this->customer =  $Customer->find();
    }
    /////////////////////////////////////////////////////////////////////////
    public function  registro(){
        //Registrar un  Actor
        if( Input::hasPost("customer")){//preguntar si por post se envio libro
            $customer = Input::post("customer");    // recuperar valores de form
            if ((new Customer($customer))->save()) {
                Flash::info("Direccion registrada!!");
            } else {
                Flash::error("No fue posible registrar la dirección !!");
            }
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////////
    public function modificar($id){
        $this->customer = (new Customer())->find($id); //recuperar el registro
        if( Input::hasPost("customer")){//verificar el envio del formulario
            $params = Input::post("customer");//recuperar parametros
            $this->customer->save($params);//actualizar el registor
            Flash::info("Información actualizada!!");
        }
    }
    /////////////////////////////////
    public function eliminar($id)
    {
        if ((new Customer)->delete((int) $id)) {
                Flash::valid('Operación exitosa');
        } else {
                Flash::error('Falló Operación');
        }

        //enrutando por defecto al index del controller
        return Redirect::to();
    }
    ///////////////////////////////////////////////////////////////////
    public function  ver($id){
        $this->customer = (new Customer())->find_all_by("id",$id); //recuperar el registro
        $this->rTotalRentas1 = (new Customer())->getTotalRentas1($id);
        $this->rTotalRentas2 = (new Customer())->getTotalRentas2($id);
        $this->rTotalRentas = (new Customer())->getTotalRentas($id);
        $this->tfilmcostumer = (new Customer())->getfilmcostumer($id);
    }


}