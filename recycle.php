<?php

include('config.php');
include('navbar.php');


	if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }

    $num_per_page = 5;
    $start_from = ($page-1)*5;
    
    $sql = "select * from trash limit $start_from,$num_per_page";
    $result = mysqli_query($conn,$sql);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Restored Information</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style type="text/css">
             .container {
              top: 16%;
              left: 12%;
              position: absolute;
             }
             a {
       		padding: 5px;     
        			
    		}
     		a:hover img {
        	transform: scale(4.5);
        	box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        	transition: 0.5s;
        	border-radius: 5px;
    					}

           </style>
</head>
<body>
	<div class="container">
	<div class="">
		<h3 class="text-center">
		  RESTORED INFORMATION</h3>
		<!--
		<h3 class="text-center">
		  STUDENTS INFORMATION
		   <span style="margin-left: 30px;">
		   	     <a href="#"><i class="fa fa-plus" data-toggle="modal" data-target="#myModal"></i></a>
		   </span>
		  -->
		   <br>
		</h3>
		<table class="table table-bordered table-striped table-hover">
			<tr>
				<th class="text-center">ID</th>
				<th class="text-center">SCHOOL ID</th>
				<th class="text-center">FULL NAME</th>
				<th class="text-center">GENDER</th>
				<th class="text-center">COURSE</th>
				<th class="text-center">YEAR AND SECTION</th>
				<th class="text-center">CONTACT NO.</th>
				<th class="text-center">ADDRESS</th>
				<th class="text-center">PICTURE</th>
				<th class="text-center">RESTORE</th>
			</tr>

			<?php

        	$get_data = "SELECT * FROM trash";
        	$sql = mysqli_query($conn,$get_data);

        	while($row = mysqli_fetch_array($result))
        	{
        		$id = $row['id'];
        		$lrn = $row['lrn'];
				$fname = $row['fname'];
				$gender = $row['gender'];
				$course = $row['course'];
				$year = $row['year'];
				$contact = $row['contact'];
				$address = $row['address'];
        		$pic = $row['pic'];

        		echo "
        		<tr>
        		<td class='text-center'>$id</td>
				<td class='text-center'>$lrn</td>
				<td class='text-center'>$fname</td>
				<td class='text-center'>$gender</td>
				<td class='text-center'>$course</td>
				<td class='text-center'>$year</td>
				<td class='text-center'>$contact</td>
				<td class='text-center'>$address</td>
				<td class='text-center'><a href='#'><img src='images/$pic' style='width:50px; height:50px;'></td>
		
					<td class='text-center'>
					<span>
						<a href='#'>
						     <i class='fa fa-recycle' data-toggle='modal' data-target='#$id' style='' aria-hidden='true'></i>
						</a>
					</span>
					
				</td>
			</tr>
        		";
        	}

        	?>

			
		</table>

			 <?php 
    
    
		    $sql="select * from trash";
		  	$result = mysqli_query($conn, $sql);
		    $total_records=mysqli_num_rows($result);
		    $total_pages=ceil($total_records/$num_per_page);

            if($page>1)
                {
                    echo "<a href='recycle.php?page=".($page-1)."' class='btn btn-danger'>Previous</a>";
                }

                
                for($i=1;$i<$total_pages;$i++)
                {
                    echo "<a href='recycle.php?page=".$i."' class='btn btn-primary'>$i</a>";
                }

                if($i>$page)
                {
                    echo "<a href='recycle.php?page=".($page+1)."' class='btn btn-danger'>Next</a>";
                }
        
        ?>
		   
	</div>
	</div>

	<!------RESTORE modal---->


<!-- Modal -->
<?php

$get_data = "SELECT * FROM trash";
$run_data = mysqli_query($conn,$get_data);

while($row = mysqli_fetch_array($run_data))
{
	$trash_id = $row['trash_id'];
	echo "
<div id='$id' class='modal fade' role='dialog'>
  <div class='modal-dialog'>
    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title text-center'>Are you want to sure??</h4>
      </div>
      <div class='modal-body'>
        <a href='restore.php?trash_id=$id' class='btn btn-danger' style='margin-left:250px'>Delete</a>
      </div>
      
    </div>
  </div>
</div>
	";
}


?>


</body>
</html>