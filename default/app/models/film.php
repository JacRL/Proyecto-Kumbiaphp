<?php
class Film extends ActiveRecord{
    
    public function getactorsMovie($id){
        return $this->find_all_by_sql("SELECT CONCAT (a.first_name,' ', a.last_name) complete_name
        FROM film f 
        INNER JOIN film_actor fa ON f.id = fa.film_id
        INNER JOIN actor a ON fa.actor_id = a.id
        WHERE f.id = $id");
    }
    
public function getspecial($id){
    return $this->find_by_sql("SELECT special_features
    FROM film f 
    WHERE f.id = $id");
}
public function getcategory($id){
    return $this->find_by_sql("SELECT category.name 
    FROM category 
    INNER JOIN film_category ON category.id = film_category.category_id 
    INNER JOIN film ON film.id = film_category.film_id 
    WHERE film.id = $id");
}
public function getrating($id){
    return $this->find_by_sql("SELECT rating
    FROM film f 
    WHERE f.id = $id");
}
public function gettimerent($id){
    return $this->find_by_sql("SELECT COUNT(*) AS Veces_rentada
    FROM rental
    JOIN inventory ON rental.inventory_id = inventory.id
    JOIN film ON inventory.film_id = film.id
    WHERE film.id = $id");
}
public function gettimemount($id){
    return $this->find_all_by_sql("SELECT MONTH(rental_date) as month, COUNT(*) as num_rentals
    FROM rental
    JOIN inventory ON rental.inventory_id = inventory.id
    JOIN film ON inventory.film_id = film.id
    WHERE film.id = $id
    GROUP BY month
    ORDER BY num_rentals DESC
    LIMIT 1;");
}

    protected function initialize(){
        ///////////////////////////RELATIONS////////////////////////////////////
        //$this->has_many('Languaje', 'model:languaje', 'fk: languaje_id');
        //$this->belongs_to('Nameactor', 'model:FilmActor', 'fk: id');
        $this->belongs_to('Film', 'model: Film', 'fk: film_id');
        $this->belongs_to('Languaje', 'model: Languaje', 'fk: language_id');
        $this->belongs_to('Actores', 'model: FilmActor', 'fk: film_id');

        $this->validates_uniqueness_of("store_id");
        $this->validates_numericality_of("language_id");
        $this->validates_numericality_of("original_language_id");
        $this->validates_numericality_of("rental_duration");
        $this->validates_numericality_of("rental_rate");
        $this->validates_numericality_of("rental_duration");
        $this->validates_presence_of("title" );
        $this->validates_presence_of("language_id" );
        $this->validates_presence_of("rental_duration" );
        $this->validates_presence_of("rental_rate" );
        $this->validates_presence_of("replacement_cost" );
    }

}