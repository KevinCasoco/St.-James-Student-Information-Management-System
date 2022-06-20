<?php

	include 'config.php';

	session_start();

	if (isset($_SESSION['user'])) {
		header("Location: index.php");
	}


	if (isset($_POST['submit'])) {
		$user = $_POST['user'];
		$password = $_POST['password'];
		$cpass = $_POST['cpass'];
	
	if ($password == $cpass) {

		$sql = "SELECT * FROM login_student WHERE user = '$user'";
		$result = mysqli_query($conn, $sql);

		if (!$result->num_rows > 0) {
			
		$sql = "INSERT INTO login_student (user, password)
				VALUES ('$user', '$password')";

		$result = mysqli_query($conn, $sql);

		if ($result) {
			echo "<script>alert('Wow! User Registration Completed.')</script>";

			$user = "";
			$password = "";
			$cpass = "";
		}

		else {
			echo "<script>alert('Something Went Wrong.')</script>";
			}
		}

		else {
			echo "<script>alert('Opss Username Already Exist.')</script>";
		}
	
	}
		else {

		echo "<script>alert('Password Not Matched.')</script>";

		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7
.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">

	<title>Registration Form</title>
</head>
<body>


	<div class="center">
      <h1>Registration for Student</h1>
      <form method="post">
        <div class="txt_field">
          <input type="text" name="user" required>
          <span></span>
          <label>Username</label>
        </div>

        <div class="txt_field">
          <input type="password" name="password" minlength="6" required>
          <span></span>
          <label>Password</label>
        </div>

         <div class="txt_field">
          <input type="password"  name="cpass" minlength="6" required>
          <span></span>
          <label>Confirm Password</label>
        </div>

        <input type="submit" name="submit" value="Register">
        <div class="signup_link">
          Have an account? <a href="index.php">Login Here</a>
        </div>


      </form>
    </div>




</body>
</html>