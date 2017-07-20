<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/functions.php");?>
<?php confirm_logged_in(); ?>
<?php
    $current_user = $_SESSION["username"];
    $name_query = "SELECT * FROM users WHERE username = '{$current_user}' LIMIT 1";
    $name_result = mysqli_query($conn, $name_query);
    confirm_query($name_result);
    $name_title = mysqli_fetch_assoc($name_result);
    $first_name = explode(" ", $name_title['name']);

    $hotel_query = "SELECT DISTINCT(name) FROM hotels";
    $hotel_result = mysqli_query($conn, $hotel_query);
    confirm_query($hotel_result);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Prashant Bhardwaj">

    <title>Hotels</title>

    
    <link href="css/bootstrap.min.css" rel="stylesheet">

  
    <link href="css/sb-admin.css" rel="stylesheet">

    
    <link href="css/plugins/morris.css" rel="stylesheet">

   
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    

</head>

<body>

    <div >

     
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Hotels</a>
            </div>
          
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="logout.php" class="dropdown-toggle" ><i class="fa fa-sign-out"></i> </a>
                </li>                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo htmlentities($first_name[0]); ?> </a>
                </li>
            </ul>
            
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                            <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-info-circle"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                      
                <div class="row">
                <?php
                    while ($list = mysqli_fetch_assoc($hotel_result)) { ?>
                        
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-hotel fa-4x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div><h3><?php echo ucfirst($list['name']); ?></h3></div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="book.php?name=<?php echo urlencode($list['name']); ?>">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php
                    }
                ?>
                </div>
            </div>
          

        </div>
    

    </div>

    <script src="js/jquery.js"></script>


    <script src="js/bootstrap.min.js"></script>

    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
<?php 
if (isset ($conn)){
    mysqli_close($conn);
}
?>