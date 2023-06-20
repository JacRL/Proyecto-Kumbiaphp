<?php
class City extends ActiveRecord{
    protected function initialize(){
        $this->validates_uniqueness_of("city");
        $this->validates_numericality_of("country_id");
        $this->validates_presence_of("city" );
        $this->validates_presence_of("city_id" );
    }
    public $debug = false;//activar true
}