<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body{
            font-family: 'Poppins', sans-serif;
            background-color: #1A1E25;
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>