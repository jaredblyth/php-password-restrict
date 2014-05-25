<?php

ob_start();

// This script was written by Jared Blyth in 2013. It enables the page to be restricted to those who login with the correct username & password. Otherwise the user cannot see the page content. All functions to restrict access, view authorised content, login and logout are contained within this single page script:


//The HTML content to be viewed by authorised users is placed in the content section towards the bottom of this script document:


//If the file name is changed from page2.php then the form action value in the login and logout scripts toward the bottom of the document will also need to be changed to match the new file name:


//The username & password can be set as variables here:

$username = 'testusername';
$password = 'testpassword';



//Cookie names and values are referenced three times in the script but cannot seem to insert then as variables here. It is recommended that you change the cookie names and values if you plan to copy this page for another page, otherwise logging in on one page will create a cookie that may authorise the user to view another page with the same cookie values:



// The following variables have default values:
$loggedin = false;
$error = false;
$errormessage = '<p align="center">Please make sure you enter both a user name and a password!</p>';




// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {



	// Because hitting the log out button posts this script, it will destroy the cookie to log out the user, but only if the cookie already exists because the user is logged in. The error message will also change to what is set below:
	if (isset($_COOKIE['Warren'])) {
	setcookie('Warren', FALSE, time()-300);
	$errormessage = '<p align="center">You are now logged out</p>';
				}


	// If posting the script is not logging out the use, then it must be attempting to log the user in, so therefore the script will handle the form:
	if (!empty($_POST['email']) && !empty($_POST['password'])) {
	
		if ( (strtolower($_POST['email']) == $username) && ($_POST['password'] == $password) ) { // This is the correct username & password!
	
			// Create the cookie:
			setcookie('Warren', 'Bonfire', time()+3600);
			
			// Indicate user is now logged in by changing the variable to true which executes the function further down in the script:
			$loggedin = true;
		
		} else { // Incorrect!

			$error = '<p align="center">The submitted user name and password do not match those on file!</p>';

		}

	} else { // Forgot a field.

		$error = $errormessage;

	}

}



// Print an error if one exists:
if ($error) {
	print '<p class="error">' . $error . '</p>';
}








else { 

	// If the script is not being posted then this function checks if the user is authorised to view the page.
	// This function takes two optional values.
	// This function returns a Boolean value.
	function is_administrator($name = 'Warren', $value = 'Bonfire') {
	
	// Check for the cookie and check its value:
	if (isset($_COOKIE[$name]) && ($_COOKIE[$name] == $value)) {
		return false;
	} else {
		return true;
	}

	} // End of is_administrator() function.


	// Restrict access to authorised viewers only:
	if (!is_administrator()) {
			// Indicate they are logged in:
			$loggedin = true;

	}


}

	



//The HTML page content goes here:

$content = '<!DOCTYPE html>
<html>



<p align="center">You are now logged in! </p>




<p align="center">
<form action="page2.php" method="post">
<input type="submit" name="submit" value="Log Out!" />
</form>
</p>
</html>';








// If the user is logged in, then proceed to show page content:
if ($loggedin) {
	
	print $content;

} else {

	print '<div align="center"><h2>Login</h2>
	<form action="page2.php" method="post">
	<p><label>Username<input type="text" name="email" /></label></p>
	<p><label>Password <input type="password" name="password" /></label></p>
	<p><input type="submit" name="submit" value="Log In!" /></p>
	</form></div>';

} 


ob_end_flush(); 

?> 