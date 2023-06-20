<?php
class ActorController extends AppController
{
    public function index(){
        // opcion 1
        $Actor = new Actor();
        $this->actor =  $Actor->find();
    }
    /////////////////////////////////////////////////////////////////////////
    public function  registro(){
        //Registrar un  Actor
        if( Input::hasPost("actor")){//preguntar si por post se envio libro
            $actor = Input::post("actor");    // recuperar valores de form


            if ((new Actor($actor))->save()) {
                Flash::info("Actor registrado!!");
            } else {
                Flash::error("No fue posible registrar el actor !!");
            }
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////////
    public function modificar($id){
        $this->actor = (new Actor())->find($id); //recuperar el registro
        if( Input::hasPost("actor")){//verificar el envio del formulario
            $params = Input::post("actor");//recuperar parametros
            $this->actor->save($params);//actualizar el registor
        }
    }
    ////////////////////////////////////////////
    public function eliminar($id)
    {
        if ((new Actor)->delete((int) $id)) {
            Flash::valid('Operación exitosa');
        } else {
            Flash::error('Falló Operación');
        }

        //enrutando por defecto al index del controller
        return Redirect::to();
    }
    ///////////////////////////////////////////////////////////////////
    public function  ver($id){
        $this->actor = (new Actor())->find_all_by("id",$id); //recuperar el registro
        $this->actoresName = (new Actor())->getNameActor($id);
        $this->lastNameActor = (new Actor())->getLastNameActor($id);
        $this->dateRegistrer = (new Actor())->dateRegistrer($id);
        $this->allMoviesParticipant = (new Actor())->getAllMovies($id);
        $this->ToTmoviesForActor = (new Actor())->getTotMovies($id);
        $this->getTotRevenue = (new Actor())->getTotRevenue($id);

        $data = new Actor();
        $costoFinal = $data->getTotRevenue($id);
        $costoFinal = $costoFinal->costoFinal;
        $costoFinal = round($costoFinal, 2);
        $this->costoFinal = $costoFinal;


        $this->totMoviesAction = (new Actor())->getTotMoviesAction($id);
        $this->totMoviesAni = (new Actor())->getTotMoviesAni($id);
        $this->totMoviesChild = (new Actor())->getTotMoviesChild($id);
        $this->totMoviesCla = (new Actor())->getTotMoviesCla($id);
        $this->totMoviesCom = (new Actor())->getTotMoviesCom($id);
        $this->totMoviesDoc = (new Actor())->getTotMoviesDoc($id);
        $this->totMoviesDra = (new Actor())->getTotMoviesDra($id);
        $this->totMoviesFa = (new Actor())->getTotMoviesFa($id);
        $this->totMoviesFo = (new Actor())->getTotMoviesFo($id);
        $this->totMoviesGam = (new Actor())->getTotMoviesGa($id);
        $this->totMoviesHo = (new Actor())->getTotMoviesHo($id);
        $this->totMoviesMu = (new Actor())->getTotMoviesMu($id);
        $this->totMoviesNew = (new Actor())->getTotMoviesNew($id);
        $this->totMoviesSF = (new Actor())->getTotMoviesSF($id);
        $this->totMoviesSp = (new Actor())->getTotMoviesSp($id);
        $this->totMoviesTra = (new Actor())->getTotMoviesTra($id);
    }

}