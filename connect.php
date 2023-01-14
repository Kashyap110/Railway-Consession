<?php
error_reporting(0);
$con=mysqli_connect('localhost','root','','studentconcession');
if(!$con){
    die(mysqli_error($con));
}
?>