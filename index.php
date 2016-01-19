<?php
require 'models/model.php';

$data = new Model();
$data->connect();
$movies = $data->getAll();
var_dump($movies);
foreach($movies as $movie) {
    echo "<h3>" .$movie['title']. " (ID: " .$movie['id']. ")</h3>";
    echo "<p>";
    echo "</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie Database</title>
</head>
<body>

</body>
</html>