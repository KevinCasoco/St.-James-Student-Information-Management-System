<?php

include('config.php');


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
</head>
<body>
    <div class="container jumbotron">
        <h4 class="text-center">
           STUDENT INFORMATION MANAGEMENT SYSTEM
        </h4>
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
                    echo "<a href='listofstudent.php?page=".($page-1)."' class='btn btn-danger'>Previous</a>";
                }

                
                for($i=1;$i<$total_pages;$i++)
                {
                    echo "<a href='listofstudent.php?page=".$i."' class='btn btn-primary'>$i</a>";
                }

                if($i>$page)
                {
                    echo "<a href='listofstudent.php?page=".($page+1)."' class='btn btn-danger'>Next</a>";
                }
        
        ?>
           
    </div>


