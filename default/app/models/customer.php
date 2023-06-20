<?php
class Customer extends ActiveRecord{
    public $debug = false;//activar true
    protected function initialize(){
        $this->validates_uniqueness_of("store_id");
        $this->validates_numericality_of("store_id");
        $this->validates_numericality_of("address_id");
        $this->validates_numericality_of("active");
        $this->validates_length_of("phone", "minumum: 9",
            "El numero de telefono de tener 10 caracteres");
        $this->validates_presence_of("first_name" );
        $this->validates_presence_of("last_name" );
        $this->validates_presence_of("address_id" );
        $this->validates_presence_of("active" );
        $this->validates_presence_of("create_date" );
        $this->validates_email_in('email',
            'message: Debe escribir un
          <b>correo electronico</b> válido');
        //Relation
        $this->belongs_to('Address','model:Address','fk:customer_id');
        $this->belongs_to('Store','model:Store','fk:id');
        $this->belongs_to("Staff", "model: staff", "fk:staff_id");
    }
    public function completeName()
    {
        return $this->first_name." ".$this->last_name;
    }
    public function getTotalRentas1($id){
        return $this->find_by_sql("SELECT COUNT(*) AS renta 
        FROM customer 
        JOIN rental ON customer.id = rental.customer_id 
        JOIN inventory ON rental.inventory_id = inventory.id 
        JOIN store ON inventory.store_id = store.id 
        WHERE customer.id = $id AND store.id = 1;");
    }
    public function getTotalRentas2($id){
        return $this->find_by_sql("SELECT COUNT(*) AS renta 
        FROM customer 
        JOIN rental ON customer.id = rental.customer_id 
        JOIN inventory ON rental.inventory_id = inventory.id 
        JOIN store ON inventory.store_id = store.id 
        WHERE customer.id = $id AND store.id = 2");
        }
    public function getTotalRentas($id){
        return $this->find_by_sql("SELECT COUNT(*) AS renta 
        FROM customer 
        JOIN rental ON customer.id = rental.customer_id 
        JOIN inventory ON rental.inventory_id = inventory.id 
        JOIN store ON inventory.store_id = store.id 
        WHERE customer.id = $id");
    }
    public function getfilmcostumer($id){
        return $this->find_all_by_sql("SELECT film.title AS title, rental.rental_date AS rental_date, rental.return_date AS return_date
        FROM rental
        JOIN inventory ON rental.inventory_id = inventory.id
        JOIN film ON inventory.film_id = film.id
        WHERE rental.customer_id = $id
        ORDER BY rental.id DESC
        LIMIT 5;");
        }
}//