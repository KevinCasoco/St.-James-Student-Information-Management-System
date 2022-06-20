<?php 
	include 'config.php';

	session_start();

	if (isset($_SESSION['user'])) {
		header("Location: index.php");
	}

	if (isset($_POST['submit'])) {
		$user = $_POST['user'];
		$password = $_POST['password'];

		$sql = " SELECT * FROM login_student WHERE user = '$user' AND password = '$password'";
		$result = mysqli_query($conn, $sql);

		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['user'] = $row['user'];
			header("Location: studentinformation2.php");
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
          <input type="text" name="user" minlength="6" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" minlength="6" required>
          <span></span>
          <label>Password</label>
        </div>
        <input type="submit" name="submit" value="Login">
        <div class="signup_link">
          Create an account?<br>
         <a href="register_admin.php">Professor</a>
         <a href="register_student.php">Student</a>
        </div>
      </form>
    </div>

</div></center>
</body>
</html>