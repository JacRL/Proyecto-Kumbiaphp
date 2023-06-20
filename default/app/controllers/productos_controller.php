<?php

class ProductosController extends AppController
{
    public function index(){
        // opcion 1
        $Productos = new Productos();
        $this->productos =  $Productos->find();

        // opcion 2
        $this->productos = (new Productos())->find();
    }
    public function ver(){}
    ////////////////////////////////////////////////////////////////////////////////////////////
    public function modificar($id){
        $this->productos = (new Productos())->find($id); //recuperar el registro //recuperar el registro
        if( Input::hasPost("productos")){//verificar el envio del formulario
            $params = Input::post("productos");//recuperar parametros
            $this->productos->save($params);//actualizar el registor
            Flash::info("Producto modificado");
        }
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////
    public function nuevo(){

        if( Input::hasPost("productos")){//preguntar si por post se envio libro
            $productos = Input::post("productos");    // recuperar valores de form
            //  $book = new Libros($libro);         //Iniciar instancia del modelo
            //$book->save();                      // guardar en BD
            //  if($book->save()){

            if ((new Productos($productos))->save()) {
                Flash::info("Producto registrado");
            } else {
                Flash::error("No fue posible crear el registro del producto");
            }
        }

    }
    public function elimnar(){}
}