<?php

class AlumnosController extends AppController
{
    public function index(){
        // opcion 1
        $Alumnos = new Alumnos();
        $this->alumnos =  $Alumnos->find();
        // opcion 2
        $this->alumnos = (new Alumnos())->find();
    }
    public function ver(){}
    public function modificar($id){
        $this->alumnos = (new Alumnos())->find($id); //recuperar el registro //recuperar el registro
        if( Input::hasPost("alumnos")){//verificar el envio del formulario
            $params = Input::post("alumnos");//recuperar parametros
            $this->alumnos->save($params);//actualizar el registor
            Flash::info("Alumno modificado");
        }
    }
    public function nuevo(){

        if( Input::hasPost("alumnos")){//preguntar si por post se envio libro
            $alumnos = Input::post("alumnos");    // recuperar valores de form
            //  $book = new Libros($libro);         //Iniciar instancia del modelo
            //$book->save();                      // guardar en BD
            //  if($book->save()){
            if ((new Alumnos($alumnos))->save()) {
                Flash::info("Alumno registrado");
            } else {
                Flash::error("No fue posible crear el registro del alumno");
            }
        }

    }
    public function elimnar(){}
}