<?php 
require_once '../models/model.php';
require_once '../connection.php';

$id = $_GET['id'];

$conn = getConnection();
$model = new Model($conn);

$movie = $model->movDetails($id)[0];
$imdb_id = $movie['imdb_id'];
$url = 'http://www.omdbapi.com/?';
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
<div class="container">
    
    <h1><?= htmlentities($movie["title"])?></h1>
    <h2><?= htmlentities($movie["released"])?></h2>
    Distributor: <?= htmlentities($movie["distributor"])?>
    Genre: <?= htmlentities($movie["genre"])?>
    Rating: <?= htmlentities($movie["rating"])?>
    Gross: <?= htmlentities($movie["gross"])?>
    Tickets Sold: <?= htmlentities($movie["tickets"])?>
</div>