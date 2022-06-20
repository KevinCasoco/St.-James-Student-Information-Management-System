<?php
	
	require_once 'config.php';
	
	if(ISSET($_REQUEST['id'])){
		$id = $_REQUEST['id'];
		$query=mysqli_query($conn, "SELECT * FROM `student` 
				WHERE `id` = '$id'") or die(mysqli_error());
		$fetch=mysqli_fetch_array($query);
		
		mysqli_query($conn, "INSERT INTO `trash` 
			VALUES('$fetch[trash_id]', '$fetch[id]', 
				'$fetch[lrn]', 
				'$fetch[fname]', 
				'$fetch[gender]', 
				'$fetch[course]',
				'$fetch[year]', 
				'$fetch[contact]', 
				'$fetch[address]', 
				'$fetch[pic]',
				'$fetch[std_id]', 
				'$fetch[loi_1st]',  
				'$fetch[regform_1st]',
				'$fetch[regform_2nd]', 
				'$fetch[grades_1st]', 
				'$fetch[grades_2nd]')") or die(mysqli_error());
		
		mysqli_query($conn, "DELETE FROM `student` 
				WHERE `id` = '$id'") or die(mysqli_error());
		header('location:studentinfo.php');
	}
	
?>