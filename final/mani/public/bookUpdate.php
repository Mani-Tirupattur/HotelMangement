<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/functions.php");?>
<?php confirm_logged_in(); ?>
<?php
    $current_user = $_SESSION["username"];
    
  $hotel = $_GET['hotel'];
  $roomno = $_GET['roomno'];
  $hotel_query = "UPDATE hotels SET state = 1, guest = '{$current_user}' WHERE name = '{$hotel}' AND roomno = '{$roomno}' LIMIT 1";
  $hotel_result = mysqli_query($conn, $hotel_query);
  confirm_query($hotel_result);

  $name_query = "SELECT * FROM users WHERE username= '{$current_user}' LIMIT 1";
  $name_result = mysqli_query($conn, $name_query);
  confirm_query($name_result);
  $list = mysqli_fetch_assoc($name_result);
  $name = $list['name'];
  

  $content = "<!DOCTYPE html> ";
  $content .= "<html> ";
  $content .= "<head> ";
  $content .= "<title>Acceptance</title> "; 
  $content .= "</head> ";
  $content .= "<body style='overflow: hidden;'> ";
  $content .= "<p> ";
  $content .= "<b>Dear ".ucfirst($name)."</b> ";
  $content .= "</p><br><br> ";
  $content .= "<p> ";
  $content .= "Congratulations! You have been allotted room number <b>".$roomno."</b> in <b>".$hotel."</b>. You can pay the fee on spot.<br>We look forward to see you here. :) ";
  $content .= "</p><br><br> ";
  $content .= "<p> ";
  $content .= "<b>Regards</b> ";
  $content .= "</p> ";
  $content .= "</body> ";
  $content .= "</html>";

  // registration bill html ends

  require 'PHPMailer-master/PHPMailerAutoload.php';

  $mail = new PHPMailer;
   
  $mail->isSMTP();                                      
  $mail->Host = 'smtp.gmail.com';                       
  $mail->SMTPAuth = true;                               
  $mail->Username = 'wsadmani@gmail.com';                   
  $mail->Password = 'manivit127';               
  $mail->SMTPSecure = 'tls';                            
  $mail->Port = 587;                                    
  $mail->setFrom('wsadmani@gmail.com', 'Manideep');
  $mail->addAddress("$current_user");       
  $mail->WordWrap = 50; 
  $mail->isHTML(true);                                  
   
  $mail->Subject = 'Regarding your hotel confirmation';
  $mail->Body    = $content;
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  if(!$mail->send()) {
     echo 'Message could not be sent.';
     echo 'Mailer Error: ' ;
     redirect_to("pay.html");
     exit;
  } 

?>
<?php 
if (isset ($conn)){
    mysqli_close($conn);
}

redirect_to("pay.html");
?>