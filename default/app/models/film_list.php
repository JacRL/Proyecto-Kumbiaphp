<?php
class FilmList extends ActiveRecord{
    public $debug = true;
    public function initialize() {
        $this->validates_numericality_of("price");
        $this->validates_numericality_of("length");
        $this->validates_presence_of("title" );
    }
}
?>