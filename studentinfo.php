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
    
    $sql = "select * from students limit $start_from,$num_per_page";
    $result = mysqli_query($conn,$sql);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Information</title>
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
           </style>
</head>
<body>
	<div class="container">
	<div class="">
		<h3 class="text-center">
		  STUDENTS INFORMATION</h3>
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
				<th class="text-center">EDIT</th>
				<th class="text-center">DELETE</th>
			</tr>

			<?php

        	$get_data = "SELECT * FROM students";
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
				<td class='text-center'><img src='images/$pic' style='width:50px; height:50px;'></td>
				<td class='text-center'>
					<span>
					     <a href='#'>
					         <i class='fa fa-pencil' data-toggle='modal' data-target='#edit$id' style='' aria-hidden='true'></i>
					    </a>
					</span>
					
				</td>
				<td class='text-center'>
					<span>
						<a href='#'>
						     <i class='fa fa-trash' data-toggle='modal' data-target='#$id' style='' aria-hidden='true'></i>
						</a>
					</span>
					
				</td>
			</tr>


        		";
        	}

        	?>

			
			
		</table>

			 <?php 
    
    
		    $sql="select * from students";
		  	$result = mysqli_query($conn, $sql);
		    $total_records=mysqli_num_rows($result);
		    $total_pages=ceil($total_records/$num_per_page);

            if($page>1)
                {
                    echo "<a href='studentinfo.php?page=".($page-1)."' class='btn btn-danger'>Previous</a>";
                }

                
                for($i=1;$i<$total_pages;$i++)
                {
                    echo "<a href='studentinfo.php?page=".$i."' class='btn btn-primary'>$i</a>";
                }

                if($i>$page)
                {
                    echo "<a href='studentinfo.php?page=".($page+1)."' class='btn btn-danger'>Next</a>";
                }
        
        ?>
		   
	</div>
	</div>



	<!-- 
	- -Add in modal

 Modal
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

     Modal content 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Add Data</h4>
      </div>
      <div class="modal-body">
        <form action="add.php" method="POST" enctype="multipart/form-data">


        	<div class="form-group">
        		<label>LRN</label>
        		<input type="text" name="lrn" class="form-control" placeholder="Your LRN....." required>
        	</div>

        	<div class="form-group">
        		<label>FULL NAME</label>
        		<input type="text" name="fname" class="form-control" placeholder="Your Full Name....." required>
        	</div>

        	<div class="form-group">
        		<label>GENDER</label>
        			<select name="gender" class="form-control">
        				<option value=""> -- Select --  </option>
        				<option value="Male">  Male </option>
        				<option value="Male"> Female </option>
        			</select>
        	</div>

        	<div class="form-group">
        		<label>COURSE</label>
        		<select name="course" class="form-control">
        				<option value=""> -- Select --  </option>
        				<option value="BSIS">  BSIS  </option>
        				<option value="BSIT">  BSIT  </option>
        				<option value="BSCS">  BSCS  </option>
        				<option value="BSEMC">  BSEMC  </option>
        			</select>
        	</div>

        	<div class="form-group">
        		<label>YEAR AND SECTION</label>
        		<select name="year" class="form-control">
        				<option value=""> -- Select --  </option>
        				<option value="1 A">  1 A  </option>
        				<option value="1 B">  1 B  </option>
        				<option value="2 A">  2 A  </option>
        				<option value="2 B">  2 B  </option>
        				<option value="3 A">  3 A  </option>
        				<option value="3 B">  3 B  </option>
        				<option value="4 A">  4 A  </option>
        				<option value="4 B">  4 B  </option>
        			</select>
        	</div>

        	<div class="form-group">
        		<label>CONTACT</label>
        		<input type="number" name="contact" class="form-control" placeholder="Your Number....." required>
        	</div>

        	<div class="form-group">
        		<label>ADDRESS</label>
        		<input type="text" name="address" class="form-control" placeholder="Your Address....." required>
        	</div>

        	<div class="form-group">
        		<label>IMAGE</label>
        		<input type="file" name="pic" accept="image/png, image/jpg, image/jpeg"  class="form-control" required>
        	</div>

        	
        	 <input type="submit" name="submit" class="btn btn-info btn-large" value="Submit">
        	
        	
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


-->

<!------DELETE modal---->




<!-- Modal -->
<?php

$get_data = "SELECT * FROM students";
$run_data = mysqli_query($conn,$get_data);

while($row = mysqli_fetch_array($run_data))
{
	$id = $row['id'];
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
        <a href='delete.php?id=$id' class='btn btn-danger' style='margin-left:250px'>Delete</a>
      </div>
      
    </div>

  </div>
</div>


	";
}


?>

<!----edit Data--->

<?php

$get_data = "SELECT * FROM students";
$sql = mysqli_query($conn,$get_data);

while($row = mysqli_fetch_array($sql))
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

<div id='edit$id' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
             <button type='button' class='close' data-dismiss='modal'>&times;</button>
             <h4 class='modal-title text-center'>Edit your Information</h4> 
      </div>

      <div class='modal-body'>
        <form action='edit.php?id=$id' method='post' enctype='multipart/form-data'>

             
        	<div class='form-group'>
        		<label>SCHOOL ID</label>
        		<input type='text' name='lrn' class='form-control' value='$lrn'>
        	</div>

        	<div class='form-group'>
        		<label>Full Name</label>
        		<input type='text' name='fname' class='form-control' value='$fname'>
        	</div>

        	<div class='form-group'>
        		<label>GENDER</label>
        			<select name='gender' class='form-control' value='$gender'>
        				<option value=''> -- Select --  </option>
        				<option value='Male'>  Male </option>
        				<option value='Female'> Female </option>
        			</select>
        	</div>

        	<div class='form-group'>
        		<label>COURSE</label>
        		<select name='course' class='form-control' value='$course'>
        				<option value=''> -- Select --  </option>
        				<option value='BSIS'>  BSIS  </option>
        				<option value='BSIT'>  BSIT  </option>
        				<option value='BSCS'>  BSCS  </option>
        				<option value='BSEMC'>  BSEMC  </option>
        			</select>
        	</div>

        	<div class='form-group'>
        		<label>YEAR AND SECTION</label>
        		<select name='year' class='form-control' value='$year'>
        				<option value=''> -- Select --  </option>
        				<option value='1 A'>  1 A  </option>
        				<option value='1 B'>  1 B  </option>
        				<option value='2 A'>  2 A  </option>
        				<option value='2 B'>  2 B  </option>
        				<option value='3 A'>  3 A  </option>
        				<option value='3 B'>  3 B  </option>
        				<option value='4 A'>  4 A  </option>
        				<option value='4 B'>  4 B  </option>
        			</select>
        	</div>

        	<div class='form-group'>
        		<label>Contact</label>
        		<input type='number' name='contact' class='form-control' value='$contact'>
        	</div>

        	<div class='form-group'>
        		<label>Address</label>
        		<input type='text' name='address' class='form-control' value='$address'>
        	</div>

        	<div class='form-group'>
        		<label>Image</label>
        		<input type='file' name='pic' accept='image/png, image/jpg, image/jpeg' class='form-control' required>
        		<img src = 'images/$pic' style='width:50px; height:50px'>
        	</div>

        	
        	 <input type='submit' name='submit' class='btn btn-info btn-large' value='Submit'>
        	



        </form>
      </div>

    </div>

  </div>
</div>


	";
}


?>


</body>
</html>