<?php

include('config.php');

if(isset($_POST['submit'])){
	$lrn = $_POST['lrn'];
	$fname = $_POST['fname'];
	$gender = $_POST['gender'];
	$course = $_POST['course'];
	$year = $_POST['year'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];

	// 2x2 picture
	$msg = "";
	$pic = $_FILES['pic']['name'];
	$p_image_tmp_name = $_FILES['pic']['tmp_name'];
	$p_image_folder = 'images/'.$pic; 

	if(move_uploaded_file($_FILES['pic']['tmp_name'], $p_image_folder)) {
		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

	// student id
	$msg = "";
	$std_id = $_FILES['std_id']['name'];
	$p_image_tmp_name = $_FILES['std_id']['tmp_name'];
	$p_image_folder = 'images/'.$std_id; 

	if(move_uploaded_file($_FILES['std_id']['tmp_name'], $p_image_folder)) {
		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

	// LOI 1st
	$msg = "";
	$loi_1st = $_FILES['loi_1st']['name'];
	$p_image_tmp_name = $_FILES['loi_1st']['tmp_name'];
	$p_image_folder = 'documents/'.$loi_1st;

	if(move_uploaded_file($_FILES['loi_1st']['tmp_name'], $p_image_folder)) {
		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

	// LOI 2nd
	$msg = "";
	$loi_2nd = $_FILES['loi_2nd']['name'];
	$p_image_tmp_name = $_FILES['loi_2nd']['tmp_name'];
	$p_image_folder = 'documents/'.$loi_2nd;

	if(move_uploaded_file($_FILES['loi_2nd']['tmp_name'], $p_image_folder)) {
		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

	// Registration Form 1st sem Picture
	$msg = "";
	$regform_1st = $_FILES['regform_1st']['name'];
	$p_image_tmp_name = $_FILES['regform_1st']['tmp_name'];
	$p_image_folder = 'images/'.$regform_1st; 

	if(move_uploaded_file($_FILES['regform_1st']['tmp_name'], $p_image_folder)) {
		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

	// Registration Form 2nd sem Picture
	$msg = "";
	$regform_2nd = $_FILES['regform_2nd']['name'];
	$p_image_tmp_name = $_FILES['regform_2nd']['tmp_name'];
	$p_image_folder = 'images/'.$regform_2nd; 

	if(move_uploaded_file($_FILES['regform_2nd']['tmp_name'], $p_image_folder)) {
		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

	// Grades 1st sem
	$msg = "";
	$grades_1st = $_FILES['grades_1st']['name'];
	$p_image_tmp_name = $_FILES['grades_1st']['tmp_name'];
	$p_image_folder = 'images/'.$grades_1st; 

	if(move_uploaded_file($_FILES['grades_1st']['tmp_name'], $p_image_folder)) {
		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

	// Grades 2nd sem
	$msg = "";
	$grades_2nd = $_FILES['grades_2nd']['name'];
	$p_image_tmp_name = $_FILES['grades_2nd']['tmp_name'];
	$p_image_folder = 'images/'.$grades_2nd; 

  	if(move_uploaded_file($_FILES['grades_2nd']['tmp_name'], $p_image_folder)) {
		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

  	$sql = "INSERT INTO student (lrn,fname,gender,course,year,contact,address,pic,std_id,loi_1st,loi_2nd,regform_1st,regform_2nd,grades_1st,grades_2nd) VALUES ('$lrn','$fname','$gender','$course','$year','$contact','$address','$pic','$std_id','$loi_1st','$loi_2nd','$regform_1st','$regform_2nd','$grades_1st','$grades_2nd')";
  	$result = mysqli_query($conn, $sql);

  	if($sql){
  		header('location:studentinfo.php');
  	}else{
  		echo "Data not insert";
  	}

  }
?>