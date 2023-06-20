<?php
class FilmCategory extends ActiveRecord{
	public function initialize() {
        $this->validates_numericality_of("category_id");
        $this->validates_numericality_of("film_id");
        $this->validates_presence_of("category_id" );
        $this->validates_presence_of("film_id" );
    }
    public $debug = true;
}
?>