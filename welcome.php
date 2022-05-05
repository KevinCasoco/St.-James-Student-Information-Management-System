<?php

session_start();

	if (isset($_SESSION['username'])) {
		header("Location: index.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>WELCOME</title>
</head>
<body>


	<?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>

	<a href="logout.php">Logout</a>
	<a href="studentinfo.php">Student</a>
	<a href="listofstudent.php">List of Student</a>
	<a href="samplestudent.php">Sample Student</a>
	<a href="trial.php">Student</a>
	<a href="navbar.php">Navbar</a>

</body>
</html>