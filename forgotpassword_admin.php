<?php 
	include 'config.php';

	if (isset($_SESSION['user'])) {
		header("Location: forgotpassword_admin.php");
	}

	if (isset($_POST['submit'])) {
		$user = $_POST['user'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];
	
	if ($password == $cpassword) {

		$sql = "SELECT * FROM login_admin WHERE user = '$user'";
		$result = mysqli_query($conn, $sql);

		if ($result->num_rows > 0) {
			
		$sql = "UPDATE login_admin SET password = '$password' WHERE user = '$user'";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			echo "<script>alert('New Password Successfully Updated.')</script>";

			$user = "";
			$password = "";
			$cpassword = "";
		}

		else {
			echo "<script>alert('Something Went Wrong.')</script>";
			}
		}

		else {
			echo "<script>alert('Username Does Not Exist.')</script>";
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

	<title>ADMIN</title>
</head>
<body>


    <div class="center">
      <h1>Forgot Password</h1>
      <form action="" method="POST">
        <div class="txt_field">
          <input type="text" name="user" minlength="6" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" minlength="6" required>
          <span></span>
          <label>New Password</label>
        </div>
         <div class="txt_field">
          <input type="password" name="cpassword" minlength="6" required>
          <span></span>
          <label>Confirm New Password</label>
        </div>
        <input type="submit" name="submit" value="Submit">
        <div class="signup_link">
          Have an account? <a href="index.php">Login Here</a>
        </div>
      </form>
    </div>
</div></center>
</body>
</html>