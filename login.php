<?php ob_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<Title>

Login

</Title>


</head>


<body>


<?php // 
/* This page lets the user login to the page. */

// Set two variables with default values:
$loggedin = false;
$error = false;



// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Handle the form:
	if (!empty($_POST['email']) && !empty($_POST['password'])) {
	
		if ( (strtolower($_POST['email']) == 'testusername') && ($_POST['password'] == 'testpassword') ) { // This is the correct username & password!
	
			// Create the cookie:
			setcookie('Chuck', 'Berry', time()+3600);
			
			// Indicate they are logged in:
			$loggedin = true;
		
		} else { // Incorrect!

			$error = '<p align="center">The submitted user name and password do not match those on file!</p>';

		}

	} else { // Forgot a field.

		$error = '<p align="center">Please make sure you enter both a user name and a password!</p>';

	}

}




// Print an error if one exists:
if ($error) {
	print '<p class="error">' . $error . '</p>';
}





// Indicate the user is logged in and then redirect to the restricted page, or show the form:
if ($loggedin) {
	
	print '<p align="center">You are now logged in!</p>';


	header('Location: page.php'); 


	
} else {

	print '<div align="center"><h2>Login</h2>
	<form action="login.php" method="post">
	<p><label>Username<input type="text" name="email" /></label></p>
	<p><label>Password <input type="password" name="password" /></label></p>
	<p><input type="submit" name="submit" value="Log In!" /></p>
	</form></div>';

} 


?>





</body>
</html>

<?php ob_end_flush(); ?>