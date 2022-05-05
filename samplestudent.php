<?php

include('config.php');


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
        .form-group {
            width: 25%;
        }

    </style>

</head>
<body>
        <br>
        <br>
        <div class="">
        <center>

          <form action="" method="GET">
                 <div class="input-group mb-3">
                <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                <br><br>
                    <button type="submit" class="btn btn-primary">Search</button>
                 </div>
        </form>     
            </div>
        </center>
        </div>

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

              <tbody>

                

             <?php 
                    if(isset($_GET['search'])) {
                    $filtervalues = $_GET['search'];
                    $sql = "SELECT * FROM students WHERE CONCAT(lrn,fname,gender,course,year) LIKE '%$filtervalues%' ";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) > 0)
                    while($row = mysqli_fetch_array($result)) {

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
                            
                                 ";
                        }
                    }

                     ?>         
    

            </table>



</body>
</html>
            