<!--
    View to see individual movie's detail page.
    First require the necessary model and connection details, 
    then retrieve the movie's id. Set up the connection, and get the
    row of data from the database with that id
-->
<?php 
require_once '../models/model.php';
require_once '../connection.php';

$id = $_GET['id'];

$conn = getConnection();
$model = new Model($conn);

$movie = $model->movDetails($id)[0];
$imdb_id = $model->movDetails($id)[0]['imdb_id'];

// request and parse json from rottentomatoes api
$url = "http://www.omdbapi.com/?i={$imdb_id}&tomatoes=true";
$json = file_get_contents($url);
$result = json_decode($json); // decode the json object
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
    
    <link rel="stylesheet" href="../css/main.css" >
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0px;">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Movie Database</a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li><a href="https://github.com/linneakw/lamp-server"><img src="../img/github.png" style="height: 30px; margin-right: 25px;"></a></li>
            </ul>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                             <a class="btn btn-primary" href="/lamp-server/index.php">Back</a></button>   
                        </li>
                       
                    </ul>
                </div>
            </div>
        </nav>
        <div id="page-wrapper" style="min-height: 650px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?= htmlentities($movie["title"])?></h1>
                    <hr />
                </div>
            </div>
            <div class="row"> 
                <div class="col-lg-12">   
                    
        </div>
    </div>
    <div class="row">
        <table class="table table-bordered table-hover dataTable no-footer">
            <tr>
                <td><strong>ID:</strong> <?= htmlentities($id)?></td>
                <td><strong>IMDB ID:</strong> <?= htmlentities($movie["imdb_id"])?></td>
                <td>
                    <strong>Release Date:</strong> <?= htmlentities($movie["released"])
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Rating:</strong> <?= htmlentities($movie["rating"])?>
                </td>
                <td><strong>IMDB Rating:</strong> <?= $result->imdbRating?></td>
                <td><strong>Genre:</strong> <?= htmlentities($movie["genre"])?></td>
               
                
            </tr>   
            <tr>
                <td>
                    <strong>Distributor:</strong> <?= htmlentities($movie["distributor"])?>
                </td>
                <td><strong>Gross:</strong> <?= htmlentities($movie["gross"])?></td>
                <td><strong>Tickets Sold:</strong> <?= htmlentities($movie["tickets"])?></td>
                
            </tr>
        </table>
        <div class="panel panel-primary">
            <div class="panel-heading">Plot</div>
                <div class="panel-body" ><p><?= $result->Plot?></p></div>
                    <div class="panel-footer" style="text-align: right"> <i><strong>- Writer(s): </strong><?= $result->Writer?></i></div>
        </div>
      
                </div>
            </div>
            
        </div>
    </div>
</body>

</html>