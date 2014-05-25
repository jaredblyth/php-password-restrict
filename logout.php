<?php ob_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />


<Title>

Log out

</Title>



</head>




<body>



<?php //
/* This is the logout page. It destroys the cookie. */

// Destroy the cookie, but only if it already exists:
if (isset($_COOKIE['Chuck'])) {
	setcookie('Chuck', FALSE, time()-300);
}


// Print a message:
echo '<p align="center">You are now logged out.</p>';

?>





</body>
</html>

<?php ob_end_flush(); ?>