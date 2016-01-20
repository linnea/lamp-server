<?php
// Make your model available
include 'models/model.php';
include 'connection.php';

$conn = getConnection();
$model = new Model($conn);
$q = $_GET['q'];
$matches = $model->search($q);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie Database</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
</head>
<body>
    <div class="container">
    <?php 
    include 'views/search.php';
    include 'views/list.php';
    ?>
    
    <a href="https://github.com/linneakw/lamp-server"><img src="">GitHub Repository</a>
    </div>
</body>
</html>