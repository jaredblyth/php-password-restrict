<!DOCTYPE html>
<html>
<head>

</head>

<body>

<?php include("functions.php"); ?>


<?php
// Restrict access to authorised viewers only:
if (!is_administrator()) {
	print '<p class="error" align="center">Access Denied - You do not have permission to access this page.</p>';
	exit();
}
?>


<p align="center">
XXXXX - PAGE CONTENT - XXXXX
</p>



<p align="center">
<a href="logout.php">Logout</a>
</p>



</body>
</html>