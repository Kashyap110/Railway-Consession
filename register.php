<?php
session_start();
$conn = mysqli_connect("localhost","root","","studentconcession");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$regid=$_POST['regid'];
$email=$_POST['email'];
$pw=$_POST['pw'];
$gender=$_POST['gender'];

$sql = "INSERT INTO students (p_fname, p_lname, p_regid, email,password,p_gender) VALUES ('$fname', '$lname', '$regid', '$email', '$pw','$gender');";
if (mysqli_errno($conn) == 1062) {
    $message = "Entered Registration Id already has an account!";
}
	else if(mysqli_query($conn, $sql))
{  
	$message = "You have been successfully registered";
}
else
{  
	$message = "Could not insert record"; 
}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/validate.js"></script>
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form name="register" method="post" action="register.php" onsubmit="return validate()">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" name="fname"  placeholder="Enter your first name" required>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" placeholder="Enter your last name" name="lname" required>
          </div>
          <div class="input-box">
            <span class="details">Registration ID</span>
            <input type="text" name="regid" placeholder="Enter your Registration Id" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" placeholder="Enter your email" required>
          </div>
          
        
          <div class="input-box">
            <span class="details">New Password</span>
            <input type="password" name="pw" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" required>
          </div>
        
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="male">
          <input type="radio" name="gender" id="dot-2" value="female">
          <input type="radio" name="gender" id="dot-3" value="other">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Other</span>
            </label>
          </div>
          </div>
          </div>
        <div class="button">
          <input type="submit" name="submit" value="Register" style="color: black;">
        </div>
      </form> 
      <a href="login.php">Already have an account? Sign In</a>
    </div>
  </div>

</body>
</html>
