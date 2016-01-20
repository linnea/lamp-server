<?php 
require_once '../models/model.php';
require_once '../connection.php';

$id = $_GET['id'];

$conn = getConnection();
$model = new Model($conn);

$movie = $model->movDetails($id)[0];
$imdb_id = $model->movDetails($id)[0]['imdb_id'];
$url = "http://www.omdbapi.com/?i={$imdb_id}&tomatoes=true";
$json = file_get_contents($url);
$result = json_decode($json);
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
<div class="container">
    <div class="row header">
        <div class="col-xs-9">
            <h1><?= htmlentities($movie["title"])?></h1>
        </div>
        <div class="col-xs-3" style="text-align: right;">
            <button class="btn-primary"><a href="/index.php">Back</a></button>
        </div>
    </div>
    <div class="row">
        
        <h3><?= htmlentities($movie["released"])?></h3>
        Distributor: <?= htmlentities($movie["distributor"])?>
        Genre: <?= htmlentities($movie["genre"])?>
        Rating: <?= htmlentities($movie["rating"])?>
        Gross: <?= htmlentities($movie["gross"])?>
        Tickets Sold: <?= htmlentities($movie["tickets"])?>
        
        <h1>Rotten Tomatoes</h1>
        <h3><?= $result->Title?></h3>
        imdb Rating: <?= $result->imdbRating?>
    </div>
</div>