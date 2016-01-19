<?php
class Model
{
    protected $connection;
    
    public function connect()
    {
        $this->connection = new PDO("mysql:host=$dbHost;dbname=$dbDatabase", "$dbUser", "$dbPassword");
    }

    public function getAll() {
        $query = $this->connection->prepare("SELECT * FROM movies");
        $query->execute();
        return $query;
    }
}?>