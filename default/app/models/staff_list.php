<?php
class StaffList extends ActiveRecord{
    public $debug = true;
    public function initialize() {
        $this->validates_presence_of("name" );
        $this->validates_presence_of("address" );
        $this->validates_presence_of("phone" );
        $this->validates_presence_of("city" );
        $this->validates_presence_of("country" );
    }
}
?>