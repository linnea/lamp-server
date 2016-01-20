
<?php
// Gets connections to the database
function getConnection() {
    // imports database variables
    require_once 'secret/db-credentials.php';
    
    try {
        $conn = new PDO("mysql:host=$dbHost;dbname=$dbDatabase;charset=utf8", $dbUser, $dbPassword);
        // returns connection
        return $conn;
        
    } catch(PDOException $e) {
        // if the database failed, catch the error and quit
        die('Could not connect to database ' . $e);
    } 
}
?>