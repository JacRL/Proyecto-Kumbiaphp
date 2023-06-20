<?php
class Address extends ActiveRecord{
    protected function initialize(){
        $this->validates_uniqueness_of("customer_id");
        $this->validates_numericality_of("city_id");
        $this->validates_numericality_of("postal_code");
        $this->validates_numericality_of("phone");
        $this->validates_presence_of("customer_id" );
        $this->validates_presence_of("city_id" );
        $this->validates_presence_of("address1" );
        $this->validates_presence_of("phone" );
        $this->validates_presence_of("location" );

        $this->belongs_to("City", "model: city", "fk:city_id");
    }
    public $debug = false;//activar true

}