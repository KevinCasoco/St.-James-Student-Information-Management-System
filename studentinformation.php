 <?php  
 
 include('navbar.php');
 include('config.php');

 $query ="SELECT * FROM students ORDER BY ID DESC";  
 $result = mysqli_query($conn, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
 
          <title>STUDENT INFORMATION SYSTEM</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

            <style type="text/css">
             .container {
              top: 7.5%;
              left: 11%;
              position: absolute;

             }
           </style>
          
      </head>  
      <body>  
           <br /><br />  
           <div class="container">   
                <br />  <br>
                <div class="table-responsive">  
                    <h3 align="center"> LIST OF STUDENTS</h3>  
                     <table id="employee_data" class="table table-striped table-bordered">  

                          <thead>  
                               <tr>  
                                    <th class="text-center">ID</th>
                                    <th class="text-center">SCHOOL ID</th>
                                    <th class="text-center">FULL NAME</th>
                                    <th class="text-center">GENDER</th>
                                    <th class="text-center">COURSE</th>
                                    <th class="text-center">YEAR AND SECTION</th>
                                    <th class="text-center">CONTACT NO.</th>
                                    <th class="text-center">ADDRESS</th>
                               </tr>  
                          </thead>  

                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '
                           <tr>
                               <td>'.$row["id"].'</td>
                               <td>'.$row["lrn"].'</td>
                               <td>'.$row["fname"].'</td>
                               <td>'.$row["gender"].'</td>
                               <td>'.$row["course"].'</td>
                               <td>'.$row["year"].'</td>
                               <td>'.$row["contact"].'</td>
                               <td>'.$row["address"].'</td>

                          </tr>
                               ';
                          }  
                          ?>  

                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
     
 });  
 </script> 