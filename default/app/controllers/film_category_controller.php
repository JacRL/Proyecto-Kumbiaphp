<?php
class FilmCategorycontroller extends AppController
{
    public function index()
    {
        $this->filmcategory = (new FilmCategory())->find();
    }
    public function nuevo()
    {
        if (Input::hasPost("film_category")) { //Pregunto si existe
            $filmcategory = Input::post("film_category");    // recuperar valores de form
            if ((new FilmCategory($filmcategory))->save()) {
                Flash::info("Creado");
            } else {
                Flash::error("No fue posible crearlo");
            }
        }
    }
    public function modificar($id)
    {
        $this->film_category = (new FilmCategory())->find($id);
        if (Input::hasPost("film_category")) { //Pregunto si existe
            $params = Input::post("film_category");    // recuperar valores de form
            $this->film_category->save($params);
        }
    }
}