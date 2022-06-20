 <?php  
 
 include('navbar.php');
 include('config.php');

 $query ="SELECT * FROM student ORDER BY ID DESC";  
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
           <link rel="stylesheet" href="styles.css">

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
                <br />  <br><br><br>
                <div class="table-responsive">  
                    <h3 align="center"> LIST OF STUDENTS</h3>  
                     <table id="student_data" class="table table-striped table-bordered">  

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
                               <td class="text-center">'.$row["id"].'</td>
                               <td class="text-center">'.$row["lrn"].'</td>
                               <td class="text-center">'.$row["fname"].'</td>
                               <td class="text-center">'.$row["gender"].'</td>
                               <td class="text-center">'.$row["course"].'</td>
                               <td class="text-center">'.$row["year"].'</td>
                               <td class="text-center">'.$row["contact"].'</td>
                               <td class="text-center">'.$row["address"].'</td>

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
      $('#student_data').DataTable();  
     
 });  
 </script>

 