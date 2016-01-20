<?php 
class Model {
    protected $conn;
    //constructer
    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }
    
    public function search($q) {
        if(isset($q) && $q != '') {
            $sql = "select * from movies where title like '%" . $q . "%'";
        } else {
            $sql = "select * from movies";
        }
        
        $stmt = $this->conn->prepare($sql);
        $success = $stmt->execute(array($q,$q));
        if (!$success) {
            //trigger_error($stmt->errorInfo());
            var_dump($stmt->errorInfo());
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }
    
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