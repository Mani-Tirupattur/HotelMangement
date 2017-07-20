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

  $hotel = $_GET['name'];
  $hotel_query = "SELECT * FROM hotels WHERE name = '{$hotel}'";
  $hotel_result = mysqli_query($conn, $hotel_query);
  confirm_query($hotel_result);
  //$list = mysqli_fetch_assoc($hotel_result);
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
            <!-- Top Menu Items -->
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

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo ucfirst($hotel); ?> <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-info-circle"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->            
                <div class="row">
                    <div class="col-lg-12" id="allot">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title text-center"><i class="fa fa-hotel"></i> Rooms</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responisve">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Room Number</th>
                                                <th>Room Type</th>
                                                <th>Service Type</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                        while ($list = mysqli_fetch_assoc($hotel_result)) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $list['roomno']; ?>
                                                </td>
                                                <td><?php echo $list['room_type']; ?></td>
                                                <td><?php echo $list['service_type']; ?></td>
                                                <td>
                                                    <?php
                                                        if ($list['state']==1) {
                                                            echo "<span style='color:red;'>Booked</span>";
                                                        } else { ?>
                                                            <a href="bookUpdate.php?hotel=<?php echo urlencode($list['name']); ?>&roomno=<?php echo urlencode($list['roomno']); ?>"><strong>Book</strong></a>
                                                            <?php
                                                        }
                                                    ?>
                                                </td>
                                            </tr>  
                                            <?php
                                        }
                                    ?> 
                                        </tbody>                                                     
                                    </table>                           
                                </div>
                            </div>
                        </div>                       
                    </div>
                </div>
            </div>
            

        </div>
        

    </div>
   
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
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