<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body{
            font-family: 'Poppins', sans-serif;
            background-color: #1A1E25;
            color: white;
        }
        #generatePdf {
         padding: 30px;
         border: 1px solid black;
         font-style: sans-serif;
         background-color: #f0f0f0;
         color:black;
      }
      #pdfButton {
         background-color: #4caf50;
         border-radius: 5px;
         margin-left: 300px;
         margin-bottom: 5px;
         color: white;
      }
    </style>
</head>
<body>
    <div class='container'>
        <div class='row'>
            <div class='col-12'><h1>NEW REQUEST</h1></div>
            <div class="col_12">
                <form method ="POST" class="row">
                  <div class="col-4">
                    <input type="text" class="form-control" placeholder="First name" aria-label="First name" name='fname'>
                  </div>
                  <div class="col-4">
                    <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name='surname'>
                  </div>
                  <div class="col-4">
                    <button type="submit" class="btn btn-primary" name ='get'>GET</button>
                  </div>
                 </form>
            </div>
            <?php
            error_reporting(0);
            $conn = mysqli_connect("localhost","root","","studentconcession");
            if(!$conn){  
                echo "<script type='text/javascript'>alert('Database failed');</script>";
                die('Could not connect: '.mysqli_connect_error());  
            }
            if(isset($_POST['get'])){
            $fname =$_POST['fname'];
            $surname=$_POST['surname'];
            $result = mysqli_query($conn, "SELECT * FROM requestnew where surname='$surname' AND fname='$fname' " );
            
            ?>

            <div class="col-12"><h2>Pending</h2>
            <?php
if (mysqli_num_rows($result) > 0) {
?> 
                <table class="table table-hover" >
                    <thead>
                        <tr>
                            
                            <th>Surname</th>             
                            <th>Firstname</th>
                            <th>Date of birth</th>
                            <th>Degree</th>
                            <th>Year</th>
                            <th>Duration</th>
                            <th>Class</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Adhaar</th>
                            <th>ID card</th>
                            <th>Status</th>
                                                      
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                        if($row['stat']=='Pending'){
                            echo '<tr>';
                            echo '<td>' . $row['surname'] . '</td>';                    
                            echo '<td>' . $row['fname'] . '</td>';                    
                            echo '<td>' . $row['dob'] . '</td>';                    
                            echo '<td>' . $row['degree'] . '</td>';                    
                            echo '<td>' . $row['years'] . '</td>';                    
                            echo '<td>' . $row['duration'] . '</td>';                    
                            echo '<td>' . $row['class'] . '</td>';                    
                            echo '<td>' . $row['sfrom'] . '</td>';                    
                            echo '<td>' . $row['sto'] . '</td>';                    
                            echo '<td><a href="http://localhost/php_workspace/Railway_concession_portal/' . $row['adhar'] . '">Adhaar</a></td>';                    
                            echo '<td><a href="http://localhost/php_workspace/Railway_concession_portal/' . $row['id'] . '">ID</a></td>';   
                            echo '<td>' . $row['stat'] . '</td>';
                            echo '</tr>'; 

                            $i++;
                        }
                    }
                      
                    ?>
                    </tbody>
                </table>
                    <?php }
                    else{
                    echo 'No New Request Remaining';
                    
                    }?>
                </div>
       <?php    $result = mysqli_query($conn, "SELECT * FROM requestnew where surname='$surname' AND fname='$fname' " ); ?>
            <div class="col-12"><h2>Approved</h2>
            <?php
if (mysqli_num_rows($result) > 0) {
?> 
                <table class="table table-hover" >
                    <thead>
                        <tr>
                            
                            <th>Surname</th>             
                            <th>Firstname</th>
                            <th>Date of birth</th>
                            <th>Degree</th>
                            <th>Year</th>
                            <th>Duration</th>
                            <th>Class</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Adhaar</th>
                            <th>ID card</th>
                            <th>Status</th>
                                                      
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                        if($row['stat']=='Approved'){
                            echo '<tr>';
                            echo '<td>' . $row['surname'] . '</td>';                    
                            echo '<td>' . $row['fname'] . '</td>';                    
                            echo '<td>' . $row['dob'] . '</td>';                    
                            echo '<td>' . $row['degree'] . '</td>';                    
                            echo '<td>' . $row['years'] . '</td>';                    
                            echo '<td>' . $row['duration'] . '</td>';                    
                            echo '<td>' . $row['class'] . '</td>';                    
                            echo '<td>' . $row['sfrom'] . '</td>';                    
                            echo '<td>' . $row['sto'] . '</td>';                    
                            echo '<td><a href="http://localhost/php_workspace/Railway_concession_portal/' . $row['adhar'] . '">Adhaar</a></td>';                    
                            echo '<td><a href="http://localhost/php_workspace/Railway_concession_portal/' . $row['id'] . '">ID</a></td>';   
                            echo '<td>' . $row['stat'] . '</td>';
                            echo '</tr>'; 

                            $i++;
                            ?>
                    </tbody>
                </table>
                <div class="col-12" id='container'>
        <div class="col-12"><button id="pdfButton">Generate PDF</button></div>
      <div id="generatePdf" class='col-12'>
         <h2>VJTI CONCESSION FORM</h2>
         <h3>Status: APPROVED</h3>
         <h4> Name:<?php echo $row['surname']; echo ' '; echo $row['fname']?></h4>
         <h4> Name of the Course:<?php echo $row['degree']; echo ' '; echo $row['years']?></h4>
         <h4> Concession(Station):: From:<?php echo $row['sfrom']; echo ' '?>To:<?php echo $row['sto']?></h4>
         <h4> <?php echo $row['duration']; echo ' '; echo $row['class']?></h4></li>
               <h4>Stamp</h4>
               <textarea name="" id="" cols="30" rows="10"></textarea>
               <h4>Signature</h4>
               <textarea name="" id="" cols="30" rows="10"></textarea>
      </div>
    </div>
                    <?php
                        }
                    }
                      
                    ?>
                    <?php }
                    else{
                    echo 'No New Request Remaining';
                        
                    }?>
        </div>
        </div>
        <?php    $result = mysqli_query($conn, "SELECT * FROM requestnew where surname='$surname' AND fname='$fname' " ); ?>
            <div class="col-12"><h2>Rejected</h2>
            <?php
if (mysqli_num_rows($result) > 0) {
?> 
                <table class="table table-hover" >
                    <thead>
                        <tr>
                            
                            <th>Surname</th>             
                            <th>Firstname</th>
                            <th>Date of birth</th>
                            <th>Degree</th>
                            <th>Year</th>
                            <th>Duration</th>
                            <th>Class</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Adhaar</th>
                            <th>ID card</th>
                            <th>Status</th>
                                                      
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                        if($row['stat']=='Rejected'){
                            echo '<tr>';
                            echo '<td>' . $row['surname'] . '</td>';                    
                            echo '<td>' . $row['fname'] . '</td>';                    
                            echo '<td>' . $row['dob'] . '</td>';                    
                            echo '<td>' . $row['degree'] . '</td>';                    
                            echo '<td>' . $row['years'] . '</td>';                    
                            echo '<td>' . $row['duration'] . '</td>';                    
                            echo '<td>' . $row['class'] . '</td>';                    
                            echo '<td>' . $row['sfrom'] . '</td>';                    
                            echo '<td>' . $row['sto'] . '</td>';                    
                            echo '<td><a href="http://localhost/php_workspace/Railway_concession_portal/' . $row['adhar'] . '">Adhaar</a></td>';                    
                            echo '<td><a href="http://localhost/php_workspace/Railway_concession_portal/' . $row['id'] . '">ID</a></td>';   
                            echo '<td>' . $row['stat'] . '</td>';
                            echo '</tr>'; 

                            $i++;
                        }
                    }
                      
                    ?>
                    </tbody>
                </table>
                    <?php }
                    else{
                    echo 'No New Request Remaining';
                    
                    }
                }
                    ?>       
        </div>
            <div class='col-12'><h1>RENEWAL REQUEST</h1></div>
            <div class="col_12">
                <form method='POST' class="row">

                  <div class="col-4">
                    <input type="text" class="form-control" placeholder="Season Ticket No" aria-label="Season Ticket No" name='tn'>
                  </div>
                  
                  <div class="col-4">
                    <button type="submit" class="btn btn-primary" name='get1'>GET</button>
                  </div>
            </form>

            </div>
            <?php
             if(isset($_POST['get1'])){
                $tn =$_POST['tn'];
                $result = mysqli_query($conn, "SELECT * FROM requestrenew where ticketno='$tn'" );
            ?>
            <div class="col-12">
                <?php
                if (mysqli_num_rows($result) > 0) {
                ?> 
                                <table class="table table-hover" >
                                    <thead>
                                        <tr>
                                            
                                            <th>Ticket Number</th>             
                                           <th>Ticket Image</th>
                                            <th>Status</th>
                                                                      
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i=0;
                                    while($row = mysqli_fetch_array($result)) {
                                        
                                            echo '<tr>';
                                            echo '<td>' . $row['ticketno'] . '</td>';                    
                                            echo '<td><a href="http://localhost/php_workspace/Railway_concession_portal/' . $row['ticketfile'] . '">Previous Pass</a></td>';
                                            echo '<td>' . $row['stat'] . '</td>';
                                            echo '</tr>'; 
                
                                            $i++;
                                        
                                    }
                                      
                                    ?>
                                    </tbody>
                                </table>
                                    <?php }
                                    else{
                                    echo 'No Renew Request Remaining';
                                    
                                    }
                                }
                            ?>
            </div>
        </div>
    </div>
    <script>
      var button = document.getElementById("pdfButton");
      button.addEventListener("click", function () {
         var doc = new jsPDF("p", "mm", [300, 300]);
         var makePDF = document.querySelector("#generatePdf");
         // fromHTML Method
         doc.fromHTML(makePDF);
         doc.save("output.pdf");
      });
   </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>