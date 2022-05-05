<?php

include('config.php');
include('navbar.php');


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
             .modal-dialog {
              left: 30%;
                
             }
             .modal-content {
              width: 90%;   
             }

             .student {
              left: 12%;
              position: absolute;
             }
            .student1{
              top: 0%;
              left: 65.5%;
              position: absolute;
             }

           </style>
</head>

  
    <!-- Modal content-->
    <div class="student">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title text-center">Student Registration</h4>
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
          </div>
        </div>
      </div>


      <div class="student1">
       <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header">
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

          <br>
           <center><input type="submit" name="submit" class="btn btn-info btn-large" value="Submit"></center>
          
          
        </form>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
</body>
</html>
