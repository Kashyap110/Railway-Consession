<?php
session_start();
if (isset($_POST['submit']))
{
	$conn = mysqli_connect("localhost","root","","studentconcession");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
$regid=$_POST['regid'];
$pw=$_POST['pw'];
$sql = "SELECT * FROM students WHERE p_regid = '$regid' AND password = '$pw';";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
		$user = mysqli_fetch_assoc($sql_result);
		if(!empty($user)){
			$_SESSION['user_info'] = $user['email'];
			$message='Logged in successfully';
		}
		else{
			$message = 'Wrong email or password.';
		}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title> Login Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/signin.css">
<link rel="stylesheet" href="css/index.css">

</head>
<script type="text/javascript">
	function validate()	{
		var pw=document.getElementById("pw");
		
   		if(pw.value.length< 8)
		{
			alert("Password consists of atleast 8 characters");
			pw.focus();
			return false;
		}
		return true;
	}
</script>
<body>
<header>
    <div class="wrapper">
        <div class="logo">
            <img src="images/VJTI Logo (Enhanced).png" height="100px" alt="" >  
        </div>
<ul class="nav-area">
<li><a href="index.html">Home</a></li>
<li><a href="about.html">About</a></li>
<li><a href="#">Sign In</a></li>
<li><a href="https://vjti.ac.in/"; target="_blank">VJTI Site</a></li>
<li><a href="contact.html">Contact</a></li>
</ul>
</div>
</header>
 <div class="loginBox">
  <h2>Log In </h2>
  <form id="login" action="login.php" onsubmit="return validate()" method="post" name="login">
    <input type="text" name="regid" placeholder="Enter Registration ID" required>
    <input type="password" name="password" placeholder="Enter Password">
    <input type="submit" style="color:black;" name="sign-in" value="Sign In">
    <a href="register.php">Don't have an account? Sign Up</a>
  </form>
</div>
<footer style="background-color: black; height: 50px; padding-top: 20px;">
    <p style="color: aliceblue; text-align: center;">Copyright &copy; 2022 VJTI Student Railway Concession, All Rights Reserved.</p>
</footer>
</body>
</html> 