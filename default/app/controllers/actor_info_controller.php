<?php

class ActorInfocontroller extends AppController
{
    public function index()
    {
        $this->actorinfo = (new ActorInfo())->find();
    }
    public function nuevo()
    {
        if (Input::hasPost("actor_info")) { //Pregunto si existe
            $actorinfo = Input::post("actor_info");    // recuperar valores de form

            if ((new ActorInfo($actorinfo))->save()) {
                Flash::info("Actor creado");
            } else {
                Flash::error("No fue posible crear el actor");
            }
        }
    }
    public function modificar($id)
    {
        $this->actor_info = (new ActorInfo())->find($id);
        if (Input::hasPost("actor_info")) { //Pregunto si existe
            $params = Input::post("actor_info");    // recuperar valores de form
            $this->actor_info->save($params);
        }
    }
}