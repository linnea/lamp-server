<?php
// Make your model available
include 'models/model.php';
include 'connection.php';
// get the connection
$conn = getConnection();
// create model with the connection to db
$model = new Model($conn);

// receive the user's query 
$q = $_GET['q'];
// search the database with that query
$matches = $model->search($q);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie Database</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
    
    <link rel="stylesheet" href="css/main.css" >
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0px;">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Movie Database</a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li><a href="https://github.com/linneakw/lamp-server"><img src="img/github.png" style="height: 30px; margin-right: 25px;"></a></li>
            </ul>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                                <?php include 'views/search.php';?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="page-wrapper" style="min-height: 650px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Movie Database</h1>
                    <hr />
                </div>
            </div>
            <div class="row"> 
                <div class="col-lg-12"> 
                    <!-- includes the list view, which shows the database rows of matching movies -->  
                    <?php 
                    include 'views/list.php';
                    ?>
                </div>
            </div>
        
        <div style="text-align: right">
        <hr >
        <a href="https://github.com/linneakw/lamp-server">GitHub Repository</a>
        </div>
        </div>
    </div>
</body>

</html>