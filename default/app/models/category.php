<?php
class Category extends ActiveRecord{
    protected function initialize(){
        $this->validates_presence_of("name" );
    }
    public $debug = false;//activar true

}