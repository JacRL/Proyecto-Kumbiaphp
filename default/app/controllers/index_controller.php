<?php

/**
 * Controller por defecto si no se usa el routes
 *
 */
class IndexController extends AppController
{
    //acciones
    //Cada accion tiene una vista
    //vista: app/views/index/index.phtml
    //
    /**
    * Para acceder a la vista ->
     *url: .../
     * url: .../index
     * url: .../index/index  .../controlador/vista
     * url: .../index/index  .../controlador
    */

    public function index()
    {


    }
    //vista: app/views/index/hola.phtml
    //url: .../index/hola/:nombre  -> /index/hola/karina
    public function hola($nombre)
    {
        $this->name=$nombre;

    }
}
