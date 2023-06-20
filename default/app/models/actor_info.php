<?php
class ActorInfo extends ActiveRecord{

    public $debug = true;
        protected function initialize(){
            $this->validates_presence_of("first_name" );
            $this->validates_presence_of("last_name" );
    }
}
?>
