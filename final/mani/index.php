<?php require_once("includes/session.php");?>
<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>
<?php require_once("includes/validation_functions.php"); ?>
<?php
if (logged_in()) {
	redirect_to ("public/index.php");
}
?>
<?php
$username = "";
if (isset($_POST['signin'])) {

	$required_fields = array("username", "password");
	validate_presence($required_fields);
	
	if (empty($errors)) {

		$username = $_POST['username'];
		$password = $_POST['password'];
		$found_user = attempt_login($username, $password);

		if ($found_user) {

			$_SESSION["user_id"] = $found_user["id"];
			$_SESSION["username"] = $found_user["username"];
			redirect_to("public/index.php");
			//header("Location: http://localhost/final/main.html");
		} else {
			$_SESSION["message"] = "Hub ID/password not found.";
		}
	}
} else {

}
if(isset($_POST['signup'])){
	
	$required_fields = array("username", "password");
	validate_presence($required_fields);
	
	$fields_with_max_lengths = array("username" => 30);
	validate_max_lengths($fields_with_max_lengths);

	if (empty($errors)) {
		
		$username = mysql_prep($_POST['username']);		
		$hashed_password = password_encrypt($_POST['password']);
		$pas_hash = $_POST['password'];
		$name = $_POST['name'];
		$phno = $_POST['phno'];
		if((preg_match("/^[a-zA-Z ]*$/",$name)) && (strlen($phno)==10) &&(strlen($pas_hash)>8) )	
		{
		$query = "INSERT INTO users (username, hashed_password, name, phno)";
		$query .= " VALUES ('{$username}', '{$hashed_password}', '{$name}', '{$phno}')";

		$result = mysqli_query($conn, $query);
		if ($result) {
          	$_SESSION["message"] = "Your account created!";	       	
	    } else {
		   	$_SESSION["message"] = "Profile account failed.";
	    } 

	}
               	
	}
	else{

	}
}

?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Hotel | Home</title>
		<meta name="description" content="hotel management system" />
		<meta name="keywords" content="hotel management system" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/content.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
			<!-- Top Navigation -->
			<header class="codrops-header">
				<h1>Hotel Management System</h1>
				<p>Something something and something</p>
				
			</header>
			<section>
				<p>Click one of the buttons to login or <strong>Sign Up</strong>:</p>
				<div class="mockup-content">
					
					<div class="morph-button morph-button-modal morph-button-modal-2 morph-button-fixed">
						<button type="button">Login</button>
						<div class="morph-content">
							<div>
								<div class="content-style-form content-style-form-1">
									<span class="icon icon-close">Close the dialog</span>
									<h2>Login</h2>
									<form method="post" action="index.php">
										<p><label>Email</label><input type="text"  name="username" required /></p>
										<p><label>Password</label><input type="password" name="password" required /></p>
										<p><input type="submit"  name="signin" value="Login"></p>
									</form>
								</div>
							</div>
						</div>
					</div><!-- morph-button -->
					<strong class="joiner">or</strong>
					<div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
						<button type="button">Signup</button>
						<div class="morph-content">
							<div>
								<div class="content-style-form content-style-form-2">
									<span class="icon icon-close">Close the dialog</span>
									<h2>Sign Up</h2>
									<form method="post" action="index.php">
										<p><label>Name</label><input type="text" name="name" /></p>
										<p><label>Email</label><input type="email" name="username" /></p>
										<p><label>Password</label><input type="password" name="password" /></p>
										<p><label>Phone Number</label><input type="number" name="phno" /></p>
										<p><input type="submit" name="signup" value="Sign Up" ></p>
									</form>
								</div>
							</div>
						</div>
					</div><!-- morph-button -->
					
				</div><!-- /form-mockup -->
			</section>
			
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/uiMorphingButton_fixed.js"></script>
		<script>
			(function() {
				var docElem = window.document.documentElement, didScroll, scrollPosition;

				// trick to prevent scrolling when opening/closing button
				function noScrollFn() {
					window.scrollTo( scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0 );
				}

				function noScroll() {
					window.removeEventListener( 'scroll', scrollHandler );
					window.addEventListener( 'scroll', noScrollFn );
				}

				function scrollFn() {
					window.addEventListener( 'scroll', scrollHandler );
				}

				function canScroll() {
					window.removeEventListener( 'scroll', noScrollFn );
					scrollFn();
				}

				function scrollHandler() {
					if( !didScroll ) {
						didScroll = true;
						setTimeout( function() { scrollPage(); }, 60 );
					}
				};

				function scrollPage() {
					scrollPosition = { x : window.pageXOffset || docElem.scrollLeft, y : window.pageYOffset || docElem.scrollTop };
					didScroll = false;
				};

				scrollFn();

				[].slice.call( document.querySelectorAll( '.morph-button' ) ).forEach( function( bttn ) {
					new UIMorphingButton( bttn, {
						closeEl : '.icon-close',
						onBeforeOpen : function() {
							// don't allow to scroll
							noScroll();
						},
						onAfterOpen : function() {
							// can scroll again
							canScroll();
						},
						onBeforeClose : function() {
							// don't allow to scroll
							noScroll();
						},
						onAfterClose : function() {
							// can scroll again
							canScroll();
						}
					} );
				} );

				// for demo purposes only
				[].slice.call( document.querySelectorAll( 'form button' ) ).forEach( function( bttn ) { 
					bttn.addEventListener( 'click', function( ev ) { ev.preventDefault(); } );
				} );
			})();
		</script>
	</body>
</html>
<?php
if (isset ($conn)){
	mysqli_close($conn);
}
?>