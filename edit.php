<?php
include('config.php');
$id = $_GET['id'];

if(isset($_POST['submit'])){
	$lrn = $_POST['lrn'];
	$fname = $_POST['fname'];
	$gender = $_POST['gender'];
	$course = $_POST['course'];
	$year = $_POST['year'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];

	//image upload

	$msg = "";
	$pic = $_FILES['pic']['name'];
	$p_image_tmp_name = $_FILES['pic']['tmp_name'];
	$p_image_folder = 'images/'.$pic;

	if(move_uploaded_file($_FILES['pic']['tmp_name'], $p_image_folder)) {
		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

	$update = "UPDATE students SET lrn='$lrn', fname='$fname', gender='$gender', course ='$course', year ='$year',  contact = '$contact', address ='$address', pic = '$pic' WHERE id=$id ";
	$result = mysqli_query($conn,$update);

	if($result){
		header('location:studentinfo.php');
	}else{
		echo "Data not update";
		}
	}

?>