<?php
 error_reporting(0);
include ( './connect.php');
if(isset($_POST['submit'])){
    $surname=$_POST['lastname'];
    $fanme=$_POST['firstname'];
    $dob=$_POST['dob'];
    $nameofcourse=$_POST['degree'];
    $sfrom=$_POST['sfrom'];
    $sto=$_POST['sto'];
    $period=$_POST['duration'];
    $adhaar=$_FILES['adhaar'];
    $id=$_FILES['id'];

    echo $surname; 
    echo "<br>";
    echo $fanme;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display data</title>
    <link href ="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
</body>
</html>