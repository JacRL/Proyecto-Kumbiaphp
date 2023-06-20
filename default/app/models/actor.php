<?php
class Actor extends ActiveRecord{
    public $debug = false;//activar true
    protected function initialize(){
        $this->validates_presence_of("first_name" );
        $this->validates_presence_of("last_name" );
    }
    public function completeName()
    {
        return $this->first_name." ".$this->last_name;
    }
    public function urlImage()
    {
        return $this->image;
    }
    public function getNameActor($id){
        return $this->find_by_sql("
        SELECT r.first_name
        FROM actor r
        WHERE r.id = $id;");
    }
    public function getLastNameActor($id){
        return $this->find_by_sql("
        SELECT last_name
        FROM actor
        WHERE id = $id;");
    }
    public function dateRegistrer($id){
        return $this->find_by_sql("
        SELECT updated_id
        FROM actor
        WHERE id = $id;");
    }
    public function getAllMovies($id){
        return $this->find_all_by_sql("
        SELECT f.title,c.name
        FROM actor a
        INNER JOIN film_actor fa ON a.id = fa.actor_id
        INNER JOIN film f ON fa.film_id =f.id 
        INNER JOIN film_category fc ON f.id =fc.film_id
        INNER JOIN category c ON fc.category_id=c.id
        WHERE a.id = $id;");
    }
    public function getTotMovies($id){
        return $this->find_by_sql("SELECT COUNT(f.title) AS total_peliculas
        FROM actor a
        INNER JOIN film_actor fa ON a.id = fa.actor_id
        INNER JOIN film f ON fa.film_id = f.id
        INNER JOIN film_category fc ON f.id = fc.film_id
        INNER JOIN category c ON fc.category_id = c.id
        WHERE a.id = $id;"
        );
    }
    public function getTotRevenue($id){
        return $this->find_by_sql("SELECT SUM(p.amount) AS total_ingresos
        FROM actor AS a
        JOIN film_actor AS fa ON a.id = fa.actor_id
        JOIN film AS f ON fa.film_id = f.id
        JOIN inventory AS i ON f.id = i.film_id
        JOIN rental AS r ON i.id = r.inventory_id
        JOIN payment AS p ON r.id = p.rental_id
        WHERE a.id = $id
        GROUP BY a.id, a.first_name, a.last_name
        ORDER BY total_ingresos DESC
        ");
    }
    public function getTotMoviesAction($id){
        return $this->find_by_sql("SELECT COUNT(*) AS total_peliculas_accion
        FROM actor AS a
        JOIN film_actor AS fa ON a.id = fa.actor_id
        JOIN film AS f ON fa.film_id = f.id
        JOIN film_category AS fc ON f.id = fc.film_id
        JOIN category AS c ON fc.category_id = c.id
        WHERE a.id =$id AND c.name = 'Action';
        ");
    }
    public function getTotMoviesAni($id){
        return $this->find_by_sql("SELECT COUNT(*) AS total_peliculas_accion
        FROM actor AS a
        JOIN film_actor AS fa ON a.id = fa.actor_id
        JOIN film AS f ON fa.film_id = f.id
        JOIN film_category AS fc ON f.id = fc.film_id
        JOIN category AS c ON fc.category_id = c.id
        WHERE a.id =$id AND c.name = 'Animation';
        ");
    }
    public function getTotMoviesChild($id){
        return $this->find_by_sql("SELECT COUNT(*) AS total_peliculas_accion
        FROM actor AS a
        JOIN film_actor AS fa ON a.id = fa.actor_id
        JOIN film AS f ON fa.film_id = f.id
        JOIN film_category AS fc ON f.id = fc.film_id
        JOIN category AS c ON fc.category_id = c.id
        WHERE a.id =$id AND c.name = 'Children';
        ");
    }
    public function getTotMoviesCla($id){
        return $this->find_by_sql("SELECT COUNT(*) AS total_peliculas_accion
        FROM actor AS a
        JOIN film_actor AS fa ON a.id = fa.actor_id
        JOIN film AS f ON fa.film_id = f.id
        JOIN film_category AS fc ON f.id = fc.film_id
        JOIN category AS c ON fc.category_id = c.id
        WHERE a.id =$id AND c.name = 'Classics';
        ");
    }
    public function getTotMoviesCom($id){
        return $this->find_by_sql("SELECT COUNT(*) AS total_peliculas_accion
        FROM actor AS a
        JOIN film_actor AS fa ON a.id = fa.actor_id
        JOIN film AS f ON fa.film_id = f.id
        JOIN film_category AS fc ON f.id = fc.film_id
        JOIN category AS c ON fc.category_id = c.id
        WHERE a.id =$id AND c.name = 'Comedy';
        ");
    }
    public function getTotMoviesDoc($id){
        return $this->find_by_sql("SELECT COUNT(*) AS total_peliculas_accion
        FROM actor AS a
        JOIN film_actor AS fa ON a.id = fa.actor_id
        JOIN film AS f ON fa.film_id = f.id
        JOIN film_category AS fc ON f.id = fc.film_id
        JOIN category AS c ON fc.category_id = c.id
        WHERE a.id =$id AND c.name = 'Documentary';
        ");
    }
    public function getTotMoviesDra($id){
        return $this->find_by_sql("SELECT COUNT(*) AS total_peliculas_accion
        FROM actor AS a
        JOIN film_actor AS fa ON a.id = fa.actor_id
        JOIN film AS f ON fa.film_id = f.id
        JOIN film_category AS fc ON f.id = fc.film_id
        JOIN category AS c ON fc.category_id = c.id
        WHERE a.id =$id AND c.name = 'Drama';
        ");
    }
    public function getTotMoviesFa($id){
        return $this->find_by_sql("SELECT COUNT(*) AS total_peliculas_accion
        FROM actor AS a
        JOIN film_actor AS fa ON a.id = fa.actor_id
        JOIN film AS f ON fa.film_id = f.id
        JOIN film_category AS fc ON f.id = fc.film_id
        JOIN category AS c ON fc.category_id = c.id
        WHERE a.id =$id AND c.name = 'Family';
        ");
    }
    public function getTotMoviesFo($id){
        return $this->find_by_sql("SELECT COUNT(*) AS total_peliculas_accion
        FROM actor AS a
        JOIN film_actor AS fa ON a.id = fa.actor_id
        JOIN film AS f ON fa.film_id = f.id
        JOIN film_category AS fc ON f.id = fc.film_id
        JOIN category AS c ON fc.category_id = c.id
        WHERE a.id =$id AND c.name = 'Foreign';
        ");
    }
    public function getTotMoviesGa($id){
        return $this->find_by_sql("SELECT COUNT(*) AS total_peliculas_accion
        FROM actor AS a
        JOIN film_actor AS fa ON a.id = fa.actor_id
        JOIN film AS f ON fa.film_id = f.id
        JOIN film_category AS fc ON f.id = fc.film_id
        JOIN category AS c ON fc.category_id = c.id
        WHERE a.id =$id AND c.name = 'Games';
        ");
    }
    public function getTotMoviesHo($id){
        return $this->find_by_sql("SELECT COUNT(*) AS total_peliculas_accion
        FROM actor AS a
        JOIN film_actor AS fa ON a.id = fa.actor_id
        JOIN film AS f ON fa.film_id = f.id
        JOIN film_category AS fc ON f.id = fc.film_id
        JOIN category AS c ON fc.category_id = c.id
        WHERE a.id =$id AND c.name = 'Horror';
        ");
    }
    public function getTotMoviesMu($id){
        return $this->find_by_sql("SELECT COUNT(*) AS total_peliculas_accion
        FROM actor AS a
        JOIN film_actor AS fa ON a.id = fa.actor_id
        JOIN film AS f ON fa.film_id = f.id
        JOIN film_category AS fc ON f.id = fc.film_id
        JOIN category AS c ON fc.category_id = c.id
        WHERE a.id =$id AND c.name = 'Music';
        ");
    }
    public function getTotMoviesNew($id){
        return $this->find_by_sql("SELECT COUNT(*) AS total_peliculas_accion
        FROM actor AS a
        JOIN film_actor AS fa ON a.id = fa.actor_id
        JOIN film AS f ON fa.film_id = f.id
        JOIN film_category AS fc ON f.id = fc.film_id
        JOIN category AS c ON fc.category_id = c.id
        WHERE a.id =$id AND c.name = 'New';
        ");
    }
    public function getTotMoviesSF($id){
        return $this->find_by_sql("SELECT COUNT(*) AS total_peliculas_accion
        FROM actor AS a
        JOIN film_actor AS fa ON a.id = fa.actor_id
        JOIN film AS f ON fa.film_id = f.id
        JOIN film_category AS fc ON f.id = fc.film_id
        JOIN category AS c ON fc.category_id = c.id
        WHERE a.id =$id AND c.name = 'Sci-Fi';
        ");
    }
    public function getTotMoviesSp($id){
        return $this->find_by_sql("SELECT COUNT(*) AS total_peliculas_accion
        FROM actor AS a
        JOIN film_actor AS fa ON a.id = fa.actor_id
        JOIN film AS f ON fa.film_id = f.id
        JOIN film_category AS fc ON f.id = fc.film_id
        JOIN category AS c ON fc.category_id = c.id
        WHERE a.id =$id AND c.name = 'Sports';
        ");
    }
    public function getTotMoviesTra($id){
        return $this->find_by_sql("SELECT COUNT(*) AS total_peliculas_accion
        FROM actor AS a
        JOIN film_actor AS fa ON a.id = fa.actor_id
        JOIN film AS f ON fa.film_id = f.id
        JOIN film_category AS fc ON f.id = fc.film_id
        JOIN category AS c ON fc.category_id = c.id
        WHERE a.id =$id AND c.name = 'Travel';
        ");
    }

}