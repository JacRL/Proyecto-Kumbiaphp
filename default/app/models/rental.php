<?php
class Rental extends ActiveRecord{

    protected function initialize(){
        $this->has_many('Inventory', 'model: Inventory', 'fk: id');
        $this->belongs_to("Customer", "model: customer", "fk:customer_id");
        $this->belongs_to("Staff", "model: staff", "fk:staff_id");
        //$this->has_many('Inventario', 'model: Inventory', 'fk: id');
        //validations
        $this->validates_numericality_of("rental_date" );
        $this->validates_numericality_of("inventory_id" );
        $this->validates_numericality_of("customer_id" );
        $this->validates_presence_of("rental_date" );
        $this->validates_presence_of("customer_id" );
        $this->validates_presence_of("staff_id" );
    }

    public $debug = false;//activar true

    public function getName($id){
        return $this->find_by_sql("SELECT CONCAT ( c.first_name,' ',c.last_name)
            FROM rental r
            INNER JOIN customer c ON r.customer_id = c.id
            WHERE r.id = $id");
    }
    public function getNameStaff($id){
        return $this->find_by_sql("SELECT CONCAT ( s.first_name,' ',s.last_name)
                FROM rental r
                INNER JOIN staff s ON r.staff_id = s.id
                WHERE r.id = $id;");
    }
    public function getNameRental($id){
        return $this->find_by_sql("SELECT f.title
                FROM rental r
                INNER JOIN inventory i ON r.inventory_id = i.id
                INNER JOIN film f ON i.film_id = f.id
                WHERE r.id = $id;");
    }
    public function getTotRental($id){
        return $this->find_by_sql("
                SELECT count(i.film_id) AS total_rentas
                FROM rental r
                INNER JOIN inventory i ON r.inventory_id = i.film_id
                WHERE r.id = $id;");
    }
    public function getTotRentalA($id) {
        return $this->find_by_sql("
                SELECT count(i.film_id) AS total_rentas
                FROM rental r
                INNER JOIN inventory i ON r.inventory_id = i.film_id
                WHERE r.id =$id AND i.store_id='1';
    ");
    }
    public function getTotRentalB($id) {
        return $this->find_by_sql("
                SELECT count(i.film_id) AS total_rentas
                FROM rental r
                INNER JOIN inventory i ON r.inventory_id = i.film_id
                WHERE r.id =$id AND i.store_id='2';
    ");
    }
    public function getFullNameStoreById($id){
        return $this->find_by_sql("SELECT store.nombre AS full_name
        FROM inventory
        INNER JOIN store ON inventory.store_id = store.id
        WHERE inventory.id = $id;");
    }
    public function getExistPayment($id){
        return $this->find_by_sql("SELECT COUNT(*) AS total 
        FROM payment
        JOIN rental ON payment.rental_id = rental.id
        WHERE payment.rental_id = $id;");
    }
    public function getRentalById($id){
        return $this->find_all_by_sql("SELECT * 
        FROM rental 
        WHERE id = $id;");
    }
    public function getFullNameCustomerById($id){
        return $this->find_by_sql("SELECT CONCAT(first_name,' ', last_name) AS full_name 
        FROM customer WHERE id = $id;");
    }
    public function getFullNameStaffById($id){
        return $this->find_by_sql("SELECT CONCAT(first_name,' ', last_name) AS full_name 
        FROM staff WHERE id = $id;");
    }
    public function getFullNameMovieById($id){
        return $this->find_by_sql("SELECT film.title AS full_name
        FROM inventory
        INNER JOIN film ON inventory.film_id = film.id
        WHERE inventory.id = $id;");
    }
    public function getPaymentByIdRental($id){
        return $this->find_all_by_sql("SELECT * FROM payment
        JOIN rental ON payment.rental_id = rental.id
        WHERE payment.rental_id = $id LIMIT 1;");
    }
    public function getComision($id){
        return $this->find_by_sql("SELECT ABS(DATEDIFF(rental.return_date, rental.rental_date) * 0.1 * film.replacement_cost) AS costoFinal
        FROM rental
        INNER JOIN inventory ON rental.inventory_id = inventory.id
        INNER JOIN film ON inventory.film_id = film.id
        WHERE rental.id = $id;");
    }
}
