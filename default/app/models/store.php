<?php
class Store extends ActiveRecord{
    protected function initialize(){
        $this->validates_presence_of("manager_staff_id" );
        $this->validates_presence_of("address_id" );
        $this->validates_presence_of("nombre" );


    }
    public $debug = false;//activar true
}