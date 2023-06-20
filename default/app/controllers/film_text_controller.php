<?php

class FilmTextController extends AppController{
    public function index(){
        $this->filmtext= (new FilmText())->find();
    }

    public function show($id){
        $this->filmtext= (new FilmText())->find($id);
    }

    public function edit($id)
    {
        if(Input::hasPost("filmtext"))
        {
            $this->filmtext = (new FilmText())->find($id);
            $parametros = Input::post("filmtext");
            Logger::alert("--------ANTES DE ACTUALIZAR--------");
            Flash::info("--------ANTES DE ACTUALIZAR--------");
            $this->filmtext->update($parametros);
        }
        $this->filmtext= (new FilmText())->find($id);
    }
}