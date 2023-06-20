<?php
class FilmText extends ActiveRecord{
    public $debug = true;
    public function initialize() {
        $this->validates_presence_of("title" );
    }

}