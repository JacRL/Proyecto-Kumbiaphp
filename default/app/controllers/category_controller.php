<?php
class CategoryController extends AppController
{
    public function index(){
        // opcion 1
        $Category = new Category();
        $this->category =  $Category->find();
    }
    public function  registro(){
        //Registrar un  Actor
        if( Input::hasPost("category")){//preguntar si por post se envio libro
            $category = Input::post("category");    // recuperar valores de form
            //  $book = new Libros($libro);         //Iniciar instancia del modelo
            //$book->save();                      // guardar en BD
            //  if($book->save()){

            if ((new Category($category))->save()) {
                Flash::info("Registered category!!");
            } else {
                Flash::error("Category no registered !!");
            }
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////////
    public function modificar($id){
        $this->category = (new Category())->find($id); //recuperar el registro
        if( Input::hasPost("category")){//verificar el envio del formulario
            $params = Input::post("category");//recuperar parametros
            $this->category->save($params);//actualizar el registor
            Flash::info("Modified category");
        }
    }
}