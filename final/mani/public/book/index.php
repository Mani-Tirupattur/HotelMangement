<?php require_once("../../includes/session.php");?>
<?php require_once("../../includes/db_connection.php");?>
<?php require_once("../../includes/functions.php");?>

<?php
  $hotel = $_GET['name'];
  $hotel_query = "SELECT * FROM hotels WHERE name = '{$hotel}'";
  $hotel_result = mysqli_query($conn, $hotel_query);
  confirm_query($hotel_result);

?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Hotel</title>
    
    
    <link rel="stylesheet" href="css/reset.css">

    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker3.standalone.css'>

        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>

    
<main>
  <h1><span class="fontawesome-plane"></span> <?php echo ucfirst($hotel); ?></h1>
  <h2>Select your booking dates below</h2>
  <form method="post" action="index.php">
  <div id="flight-datepicker" class="input-daterange input-group">
    <div class="form-item">
      <label>Arrival on</label><span class="fontawesome-calendar"></span>
      <input type="text" id="start-date" name="start" placeholder="Select check-in date" data-date-format="DD, MM d" class="input-sm form-control"/><span class="date-text date-depart"></span>
    </div>
    <div class="form-item">
      <label>Depart on</label><span class="fontawesome-calendar"></span>
      <input type="text" id="end-date" name="end" placeholder="Select check-out date" data-date-format="DD, MM d" class="input-sm form-control"/><span class="date-text date-return"></span>
    </div>
  </div><br>
  <input type="submit" name="submit" value="submit">
  </div>
  </form>
  <table>
    <tr>
      <td>708</td>
      <td>AC</td>
      <td>delux</td>
      <td>Book</td>
    </tr>
    <tr>
      <td>708</td>
      <td>AC</td>
      <td>delux</td>
      <td>Book</td>
    </tr>
    <tr>
      <td>708</td>
      <td>AC</td>
      <td>delux</td>
      <td>Book</td>
    </tr>
    <tr>
      <td>708</td>
      <td>AC</td>
      <td>delux</td>
      <td>Book</td>
    </tr>
  </table>
</main>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-dateFormat/1.0/jquery.dateFormat.js'></script>

        <script src="js/index.js"></script>

    
    
    
  </body>
</html>
<?php 
if (isset ($conn)){
    mysqli_close($conn);
}
?>