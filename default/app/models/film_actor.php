<?php

class FilmActor extends ActiveRecord{
    public $debug = true;
    public function initialize() {
        $this->validates_numericality_of("actor_id");
        $this->validates_numericality_of("film_id");
        $this->validates_presence_of("actor_id" );
        $this->validates_presence_of("film_id" );
    }
}
?>