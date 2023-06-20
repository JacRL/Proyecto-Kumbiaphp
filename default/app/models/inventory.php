<?php
class Inventory extends ActiveRecord{
    protected function initialize(){
        $this->belongs_to("Film", "model: film", "fk: film_id");
        $this->belongs_to('Store', 'model: Store', 'fk: store_id');
        ///
        $this->validates_presence_of("film_id");
        $this->validates_presence_of("store_id");
        $this->validates_numericality_of("film_id");
        $this->validates_numericality_of("store_id");
    }
    public $debug = false;//activar true
}
