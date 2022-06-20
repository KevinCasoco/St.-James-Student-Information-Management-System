<?php

include('config.php');
include('navbar2.php');


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
    
    $sql = "select * from student limit $start_from,$num_per_page";
    $result = mysqli_query($conn,$sql);


?>

<!DOCTYPE html>
<html>
<head>
    <title>Application Student</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style type="text/css">
             .container {
              top: 10.5%;
              left: 11%;
              position: absolute;
             }
             a {
             padding: 5px;     
                    
            }
            a:hover img {
            transform: scale(6.0);
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
                <th class="text-center">STUDENT NO</th>
                <th class="text-center">FULL NAME</th>
                <th class="text-center">SCHOOL ID</th>
                <th class="text-center">LOI 1ST YEAR</th>
                <th class="text-center">LOI 2ND YEAR</th>
                <th class="text-center">REG 1ST SEM</th>
                <th class="text-center">REG 2ND SE,</th>
                <th class="text-center">GRADES 1ST SEM</th>
                <th class="text-center">GRADES 2ND SEM</th>
            </tr>

            <?php

            $get_data = "SELECT * FROM student";
            $sql = mysqli_query($conn,$get_data);

            while($row = mysqli_fetch_array($result))
            {
                $id = $row['id'];
                $lrn = $row['lrn'];
                $fname = $row['fname'];
                $std_id = $row['std_id'];
                $loi_1st = $row['loi_1st'];
                $loi_2nd = $row['loi_2nd'];
                $regform_1st = $row['regform_1st'];
                $regform_2nd = $row['regform_2nd'];
                $grades_1st = $row['grades_1st'];
                $grades_2nd = $row['grades_2nd'];
                echo "
                <tr>
                <td class='text-center'>$id</td>
                <td class='text-center'>$lrn</td>
                <td class='text-center'>$fname</td>
                <td class='text-center'><a href='#'><img src='images/$std_id' style='width:50px; height:50px;'></td>
                <td class='text-center'>$loi_1st</td>
                <td class='text-center'>$loi_2nd</td>
                <td class='text-center'><a href='#'><img src='images/$regform_1st' style='width:50px; height:50px;'></td>
                <td class='text-center'><a href='#'><img src='images/$regform_2nd' style='width:50px; height:50px;'></td>
                <td class='text-center'><a href='#'><img src='images/$grades_1st' style='width:50px; height:50px;'></td>
                 <td class='text-center'><a href='#'><img src='images/$grades_2nd' style='width:50px; height:50px;'></td>
                <td class='text-center'>
                    
                </td>
            </tr>
                ";
            }

            ?>

            
            
        </table>

             <?php 
    
    
            $sql="select * from student";
            $result = mysqli_query($conn, $sql);
            $total_records=mysqli_num_rows($result);
            $total_pages=ceil($total_records/$num_per_page);

            if($page>1)
                {
                    echo "<a href='studentinfo2.php?page=".($page-1)."' class='btn btn-danger'>Previous</a>";
                }

                
                for($i=1;$i<$total_pages;$i++)
                {
                    echo "<a href='studentinfo2.php?page=".$i."' class='btn btn-primary'>$i</a>";
                }

                if($i>$page)
                {
                    echo "<a href='studentinfo2.php?page=".($page+1)."' class='btn btn-danger'>Next</a>";
                }
        
        ?>
           
    </div>
    </div>



<!------DELETE modal---->

<!-- Modal -->
<?php

$get_data = "SELECT * FROM student";
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

$get_data = "SELECT * FROM student";
$sql = mysqli_query($conn,$get_data);

while($row = mysqli_fetch_array($sql))
{
                $id = $row['id'];
                $lrn = $row['lrn'];
                $fname = $row['fname'];
                $std_id = $row['std_id'];
                $loi_1st = $row['loi_1st'];
                $loi_2nd = $row['loi_2nd'];
                $regform_1st = $row['regform_1st'];
                $regform_2nd = $row['regform_2nd'];
                $grades_1st = $row['grades_1st'];
                $grades_2nd = $row['grades_2nd'];
    echo "
<div id='edit2$id' class='modal fade' role='dialog'>
  <div class='modal-dialog'>
    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
             <button type='button' class='close' data-dismiss='modal'>&times;</button>
             <h4 class='modal-title text-center'>Edit your Information</h4> 
      </div>
      <div class='modal-body'>
        <form action='edit2.php?id=$id' method='post' enctype='multipart/form-data'>
             
                <div class='form-group'>
                <label>STUDENT NO.</label>
                <input type='text' name='lrn' class='form-control' value='$lrn'>
            </div>
            <div class='form-group'>
                <label>Full Name</label>
                <input type='text' name='fname' class='form-control' value='$fname'>
            </div>
            <div class='form-group'>
                <label>Student ID</label>
                <input type='file' name='std_id' accept='image/png, image/jpg, image/jpeg' class='form-control' required>
                <img src = 'images/$std_id' style='width:50px; height:50px'>
            </div>
            <div class='form-group'>
                <label>LOI 1ST SEM</label>
            <input type='file' name='loi_1st' accept='application/msword,text/plain, application/pdf' class='form-control' required>    
            </div>
            <div class='form-group'>
                <label>LOI 2ND SEM</label>
            <input type='file' name='loi_2nd' ' accept='application/msword,text/plain, application/pdf' class='form-control' required>    
            </div>
                <div class='form-group'>
                <label>REGISTRATION FORM 1ST SEM</label>
                <input type='file' name='regform_1st' accept='image/png, image/jpg, image/jpeg' class='form-control' required>
                <img src = 'images/$regform_1st' style='width:50px; height:50px'>
                </div>
                <div class='form-group'>
                <label>REGISTRATION FORM 2ND SEM</label>
                <input type='file' name='regform_2nd' accept='image/png, image/jpg, image/jpeg' class='form-control' required>
                <img src = 'images/$regform_2nd' style='width:50px; height:50px'>
                </div>
                <div class='form-group'>
                <label>GRADES 1ST SEM</label>
                <input type='file' name='grades_1st' accept='image/png, image/jpg, image/jpeg' class='form-control' required>
                <img src = 'images/$grades_1st' style='width:50px; height:50px'>
                </div>
                <div class='form-group'>
                <label>GRADES 2ND SEM</label>
                <input type='file' name='grades_2nd' accept='image/png, image/jpg, image/jpeg' class='form-control' required>
                <img src = 'images/$grades_2nd' style='width:50px; height:50px'>
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