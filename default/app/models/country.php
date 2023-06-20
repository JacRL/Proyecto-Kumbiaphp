<?php
class Country extends ActiveRecord{
    protected function initialize()
    {
        $this->validates_numericality_of("country_id");
        $this->validates_presence_of("country_id");
    }
    public $debug = false;//activar true
}
