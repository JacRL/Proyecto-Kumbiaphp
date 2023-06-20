<?php
class CustomerList extends ActiveRecord{
    public $debug = true;
    protected function initialize(){
        
        $this->validates_uniqueness_of("city");
        $this->validates_numericality_of("phone");
        $this->validates_presence_of("name" );
        $this->validates_presence_of("address" );
        $this->validates_presence_of("phone" );
        $this->validates_presence_of("city" );
        $this->validates_presence_of("country" );
        $this->validates_presence_of("notes" );
        $this->validates_presence_of("SID" );
    }
}
?>
