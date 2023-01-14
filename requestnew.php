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
<?php
error_reporting(0);
$conn=mysqli_connect('localhost','root','','studentconcession');
if(!$conn){
    die(mysqli_error($conn));
}
if(isset($_POST['form_submit'])){

    $surname=$_POST['lastname'];
    $fname=$_POST['firstname'];
    $dob=$_POST['dob'];
    $year=$_POST['year1'];
    $nameofcourse=$_POST['degree'];
    $class=$_POST['class'];
    $sfrom=$_POST['sfrom'];
    $sto=$_POST['sto'];
    $period=$_POST['duration'];
    $folder='uploads/';
    
    $img_link1=$_POST["adhaar"];
    $img_link2=$_POST["id"];
    $image_file1=$_FILES['adhaar']['name'];
    $image_file2=$_FILES['id']['name'];

    $file1=$_FILES['adhaar']['tmp_name'];
    $file2=$_FILES['id']['tmp_name'];
   $path1=$folder.$image_file1;
   $path2=$folder.$image_file2;  
   $target_file1=$folder.basename($image_file1);
   $target_file2=$folder.basename($image_file2);
   $imageFileType1=pathinfo($target_file1,PATHINFO_EXTENSION);
   $imageFileType2=pathinfo($target_file2,PATHINFO_EXTENSION);
//Allow only JPG, JPEG, PNG & GIF etc formats
if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
&& $imageFileType1 != "gif" ) {
 $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';   
}
    if ($_FILES["adhaar"]["size"] > 5000000) {
    $error[] = 'Sorry, your image is too large. Upload less than 500 KB in size.';
}

if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
&& $imageFileType2 != "gif" ) {
 $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';   
}
    if ($_FILES["id"]["size"] > 5000000) {
    $error[] = 'Sorry, your image is too large. Upload less than 500 KB in size.';
}
if(!isset($error))
{
move_uploaded_file($file1,$target_file1); 
move_uploaded_file($file2,$target_file2); 
$INSERT="INSERT INTO requestnew(surname,fname,dob,degree,years,duration,class,sfrom,sto,adhar,id,stat) 
VALUES('$surname','$fname',$dob,'$nameofcourse','$year','$period','$class','$sfrom','$sto','$target_file1','$target_file2','Pending')";
if($conn->multi_query($INSERT)){
    echo "<script>
    alert('Request Sent Successfully!');
    </script>";
  }
  else
  {
    echo"<script>
    alert('Failed!');
    </script>";
  }
}
else
    {
      echo"<script>
      alert('All fields are required');
      </script>";
    }
}

?>
    <div class="container my-auto mr-auto">
        <div class="row m-3"><h1>REQUEST NEW</h1></div>
        <form method="POST" class="row g-3" enctype="multipart/form-data"> 
          <div class="col-md-5">
            <label for="inputEmail4" class="form-label">Surname(Capital letters)</label>
            <input type="text" class="form-control" name="lastname" id="lastname">
          </div>
          <div class="col-md-5">
            <label for="inputPassword4" class="form-label">Firstname(Capital letters)</label>
            <input type="text" class="form-control" name="firstname" id="firstname">
          </div>
          <div class="col-md-4">
            <label for="inputEmail4" class="form-label">Date Of Birth</label>
            <input type="date" class="form-control" name="dob" id="dob">
          </div>
          <div class="col-md-3">
            <label for="inputPassword4" class="form-label">Your Age</label>
            <input type="text" class="form-control" name="year" id="year" placeholder="Years">
          </div>
          <div class="col-md-3">
            <label for="inputPassword4" class="form-label">:</label>
            <input type="text" class="form-control" name="month" id="month" placeholder="Months">
          </div>
          <div class="col-md-3">
            <label for="inputState" class="form-label">Degree</label>
            <select name ="degree" id="degree" class="form-select">
              <option selected>Diploma</option>
              <option>M.Tech</option>
              <option>MCA</option>
              <option>FDC</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="inputState" class="form-label">Year</label>
            <select name="year1" id="year1" class="form-select">
              <option selected>FY</option>
              <option>SY</option>
              <option>TY</option>
              <option>FINAL YR.</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="inputState" class="form-label">Duration</label>
            <select name="duration" id="duration" class="form-select">
              <option selected>Monthly</option>
              <option>Quarterly</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="inputState" class="form-label">Class</label>
            <select name="class" id="class" class="form-select">
              <option selected>1st Class</option>
              <option>2nd Class</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="inputEmail4" class="form-label">From:</label>
            <input type="text" class="form-control" name="sfrom" id="sfrom">
          </div>
          <div class="col-md-4">
            <label for="inputEmail4" class="form-label">To:</label>
            <input type="text" class="form-control" name="sto" id="sto">
          </div>
          <div class="col-md-5">
            <label for="inputEmail4" class="form-label">Adhaar file</label>
            <input type="file" class="form-control" name= "adhaar" id="adhaar">
          </div>
          <div class="col-md-5">
            <label for="inputPassword4" class="form-label">ID file</label>
            <input type="file" class="form-control" name="id" id="id">
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary" name = "form_submit">Submit</button>
          </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>