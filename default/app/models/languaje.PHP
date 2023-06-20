<?php
class Languaje extends ActiveRecord{

    protected function initialize(){
        $this->validates_uniqueness_of("name");
        $this->validates_presence_of("name" );
    }

    public $debug = false;//activar true
}