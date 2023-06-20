<?php

class FilmActorcontroller extends AppController
{
    public function index()
    {
        $this->filmactor = (new FilmActor())->find();
    }
    public function nuevo()
    {
        if (Input::hasPost("film_actor")) { //Pregunto si existe
            $filmactor = Input::post("film_actor");    // recuperar valores de form

            if ((new FilmActor($filmactor))->save()) {
                Flash::info("Creado");
            } else {
                Flash::error("No fue posible crearlo");
            }
        }
    }
    public function modificar($id)
    {
        $this->film_actor = (new FilmActor())->find($id);
        if (Input::hasPost("film_actor")) { //Pregunto si existe
            $params = Input::post("film_actor");    // recuperar valores de form
            $this->film_actor->save($params);
        }
    }
}