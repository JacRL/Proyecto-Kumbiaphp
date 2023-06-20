<?php
class Payment extends ActiveRecord{
    protected function initialize(){
        $this->belongs_to("Customer", "model: customer", "fk:customer_id");
        $this->belongs_to("Staff", "model: staff", "fk:staff_id");
        $this->belongs_to("Rental", "model: rental", "fk:rental_id");
        $this->has_many('Inventario', 'model: Inventory', 'fk: id');

        $this->validates_numericality_of("customer_id");
        $this->validates_numericality_of("staff_id");
        $this->validates_numericality_of("rental_id");
        $this->validates_numericality_of("amount");
        $this->validates_presence_of("payment_date" );
        $this->validates_presence_of("customer_id");
        $this->validates_presence_of("staff_id");
        $this->validates_presence_of("rental_id");
        $this->validates_presence_of("amount");
    }
    public $debug = false;//activar true
}