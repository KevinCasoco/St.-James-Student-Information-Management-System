<?php

include('config.php');

$id = $_GET['id'];
$delete = "DELETE FROM student WHERE id = $id";
$result = mysqli_query($conn,$delete);

if($result){
	header('location:studentinfo.php');
}else{
	echo "Do not Delete";
}


?>