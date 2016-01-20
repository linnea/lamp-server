<?php 
// Model class connects to the database, and provides
// two functions to query the database.
class Model {
    protected $conn;
    //constructer
    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }
    
    // takes in the query string as q and filters the results
    // if the string is an empty string, or hasn't been set, it will continue
    // to show all results
    public function search($q) {
        if(isset($q) && $q != '') {
            $sql = "select * from movies where title like '%" . $q . "%'";
        } else {
            $sql = "select * from movies";
        }
        
        // prepares the sql statement
        $stmt = $this->conn->prepare($sql);
        $success = $stmt->execute(array($q,$q));
        if (!$success) {
            // dumps error info if it wasn't successfull
            var_dump($stmt->errorInfo());
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }
    // finds a movie in the database by a given id
    // otherwise, print out that there are no results
    public function movDetails($id) {
        if(isset($id) && $id != '') {
            $sql = "SELECT * FROM movies WHERE id=$id";
        } else {
            echo ("There are no results");
        }
        
        $stmt = $this->conn->prepare($sql);
        $success = $stmt->execute(array($id, $id));
        if (!$success) {
            trigger_error($stmt->errorInfo());
            var_dump($stmt->errorInfo());
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }
}
?>