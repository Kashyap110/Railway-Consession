<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
error_reporting(0);
$conn = mysqli_connect("localhost","root","","studentconcession");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
	die('Could not connect: '.mysqli_connect_error());  
}

if($_GET['approve']){
    $tn=$_GET['approve'];
    $result = mysqli_query($conn, "UPDATE requestrenew SET stat='Approved' WHERE ticketno= '$tn' ");
}
elseif($_GET['reject']){
    $tn=$_GET['reject'];
    $result = mysqli_query($conn, "UPDATE requestrenew SET stat='Disapproved' WHERE ticketno= '$tn' ");
}


$result = mysqli_query($conn, "SELECT * FROM requestrenew");
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
                            
                            <th>Ticket Number</th>             
                           <th>Ticket Image</th>
                            <th>Status</th>
                                                      
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    error_reporting(0);
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                        if($row['stat']=='Pending'){
                            echo '<tr>';
                            echo '<td>' . $row['ticketno'] . '</td>';                    
                            echo '<td><a href="http://localhost/php_workspace/Railway_concession_portal/' . $row['ticketfile'] . '">Previous Pass</a></td>';
                            echo '<td>
                                    <a href="renewalrequest.php?approve=' . $row['ticketno'] . '" data-color="#265ed7">Approve</a>
                                    <a href="renewalrequest.php?delete=' . $row['ticketno'] . '" data-color="#e95959">Disapprove</a>
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
                    echo 'No Renew Request Remaining';
                    
                    }?>
                
               
            </div>
        </div>
        
                
               
            </div>
        </div>
        <script>

        </script>
    </body>
</html>