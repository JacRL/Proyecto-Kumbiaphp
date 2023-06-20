<?php
class FilmController extends AppController
{
    public function index(){
        // opcion 1
        $Film = new Film();
        $this->film = $Film->find();
    }
    /////////////////////////////////////////////////////////////////////////
    public function  registro(){
        //Registrar un  Actor
        if( Input::hasPost("film")){//preguntar si por post se envio libro
            $film = Input::post("film");    // recuperar valores de form
            if ((new Film($film))->save()) {
                Flash::info("Film registrado!!");
            } else {
                Flash::error("No fue posible realizar el registro !!");
            }
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////////
    public function modificar($id){
        $this->film = (new Film())->find($id); //recuperar el registro //recuperar el registro
        if( Input::hasPost("film")){//verificar el envio del formulario
            $params = Input::post("film");//recuperar parametros
            $this->film->save($params);//actualizar el registor
            Flash::info("Alumno modificado");
        }
    }
    /////////////////////////////////
    public function eliminar($id)
    {
        if ((new Film)->delete((int) $id)) {
                Flash::valid('Operación exitosa');
        } else {
                Flash::error('Falló Operación');
        }
        //enrutando por defecto al index del controller
        return Redirect::to();
    }
    //////////////////////////////////////////////
    public function  ver($id){
        $this->film = (new Film())->find_all_by("id",$id); //recuperar el registro
        $this->actoresMov = (new Film())->getactorsMovie($id);
        $this->actspec = (new Film())->getspecial($id);
        $this->actcat = (new Film())->getcategory($id);
        $this->actcla = (new Film())->getrating($id);
        
        $this->actrent = (new Film())->gettimerent($id);
        $this->actmount = (new Film())->gettimemount($id);
    }
}///