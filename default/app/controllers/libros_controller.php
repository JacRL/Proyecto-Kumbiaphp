<?php

class LibrosController extends AppController
{
    public function index(){
        // opcion 1
        $Libros = new Libros();
        $this->libros =  $Libros->find();

        // opcion 2
        $this->libros = (new Libros())->find();
    }
    public function ver(){}
    ////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////
    public function modificar($id){
        $this->libro = (new Libros())->find($id); //recuperar el registro
        if( Input::hasPost("libro")){//verificar el envio del formulario
            $params = Input::post("libro");//recuperar parametros
            $this->libro->save($params);//actualizar el registor
        }
    }
    /////////////////////////////////////////////////////////////////////////////////////////
    public function nuevo(){

        if( Input::hasPost("libro")){//preguntar si por post se envio libro
            $libro = Input::post("libro");    // recuperar valores de form
          //  $book = new Libros($libro);         //Iniciar instancia del modelo
            //$book->save();                      // guardar en BD
          //  if($book->save()){

            if ((new Libros($libro))->save()) {
                Flash::info("Libro creado");
            } else {
                Flash::error("No fue posible crear el libro");
            }
        }

    }
    public function elimnar(){}
}