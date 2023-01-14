<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <title>Document</title>
</head>
<body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/parsley.js/1.2.2/parsley.min.js'></script>
<?php
error_reporting(0);

$conn = mysqli_connect("localhost","root","","studentconcession");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
	die('Could not connect: '.mysqli_connect_error());  
}

if($_GET['approve']){
    $tn=$_GET['approve'];
    $result = mysqli_query($conn, "UPDATE requestnew SET stat='Approved' WHERE pid= '$tn' ");
    
    $date      = date("Y/m/d");
    $expdate   = date('Y/m/d', strtotime('+1 month'));
    #$result = mysqli_query($conn, "UPDATE requestnew SET stat='Approved' WHERE pid= '$tn' ");
    #if($duration==)
    $result = mysqli_query($conn, "UPDATE requestnew SET expire='$expdate' WHERE pid= '$tn' ");
}
elseif($_GET['reject']){
    $tn=$_GET['reject'];
    $result = mysqli_query($conn, "UPDATE requestnew SET stat='Disapproved' WHERE pid= '$tn' ");
}


$result = mysqli_query($conn, "SELECT * FROM requestnew");
?>

<div class = "content">
            <div class = "container">
            <h1> Renewal Requests</h1>
             <?php
             error_reporting(0);
if (mysqli_num_rows($result) > 0) {
?> 
                <table class="table table-hover" >
                    <thead>
                        <tr>
                            
                            <th>Surname</th>             
                            <th>Firstname</th>
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
                            echo '<td>' . $row['degree'] . '</td>';                    
                            echo '<td>' . $row['years'] . '</td>';                    
                            echo '<td>' . $row['duration'] . '</td>';                    
                            echo '<td>' . $row['class'] . '</td>';                    
                            echo '<td>' . $row['sfrom'] . '</td>';                    
                            echo '<td>' . $row['sto'] . '</td>';                    
                            echo '<td><a href="http://localhost/php_workspace/Railway_concession_portal/' . $row['adhar'] . '">Adhaar</a></td>';                    
                            echo '<td><a href="http://localhost/php_workspace/Railway_concession_portal/' . $row['id'] . '">ID</a></td>';   
                            echo '<td>' . $row['stat'] . '</td>';
                            echo '<td>
                                    <a href="newrequest.php?approve=' . $row['pid'] . '" data-color="#265ed7">Approve</a>
                                    <a href="newrequest.php?reject=' . $row['pid'] . '" data-color="#e95959">Disapprove</a>
                                </td>';
                         
                            echo '</tr>'; 

                            $i++;
                        }
                    }
                      
                    ?>
                    </tbody>
                </table>
                    <?php 
                    error_reporting(0);
                }
                    else{
                    echo 'No New Request Remaining';
                    
                    }?>
                
               
            </div>
        </div>
        
                
               
            </div>
        </div>
        <script>

        </script>
    </body>
</html>