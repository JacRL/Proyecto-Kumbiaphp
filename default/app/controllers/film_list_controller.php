<?php
class FilmListController extends AppController{
    public function index(){
        $this->filmlist= (new FilmList())->find();
    }
    public function nuevo(){
        if( Input::hasPost("film_list")){ //Pregunto si existe
            $film_list = Input::post("film_list");    // recuperar valores de form
            if ((new FilmList($film_list))->save()) {
                Flash::info("film_list creado");
            } else {
                Flash::error("No fue posible crear el film_list");
            }
        }
    }
    public function modificar($id)
    {        
        if(Input::hasPost("film_list"))
        {
            $this->film_list = (new FilmList())->find($id);
            $parametros = Input::post("film_list");
            $this->film_list->update($parametros);
        }
        $this->film_list= (new FilmList())->find($id);
    }
}
