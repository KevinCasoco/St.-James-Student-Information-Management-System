<?php 
	include 'config.php';

	session_start();

	if (isset($_SESSION['username'])) {
		header("Location: index.php");
	}

	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		$sql = " SELECT * FROM login WHERE email = '$email' AND pass = '$pass'";
		$result = mysqli_query($conn, $sql);

		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['username'] = $row['username'];
			header("Location: studentinformation.php");
		}
		
		else {
			echo "<script>alert('Woops Email or Password is incorrect.')</script>";
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

	<title>Log In Form</title>
</head>
<body>


    <div class="center">
      <h1>Login</h1>
      <form action="" method="POST">
        <div class="txt_field">
          <input type="email" name="email" required>
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="password" name="pass" required>
          <span></span>
          <label>Password</label>
        </div>
        <input type="submit" name="submit" value="Login">
        <div class="signup_link">
          Don't have an account? <a href="register.php">Register Here</a>
        </div>
      </form>
    </div>



</div></center>
</body>
</html>