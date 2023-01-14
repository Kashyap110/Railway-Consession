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
if(isset($_POST['submit'])){
    $ticketno=$_POST['ticketno'];
    $folder='uploads/';
   
    $img_link=$_POST["img_link"];
    $image_file=$_FILES['img_link']['name'];

    $file = $_FILES['img_link']['tmp_name'];
    $path=$folder.$image_file;
    $target_file=$folder.basename($image_file);
    $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);

    //Allow only JPG, JPEG, PNG & GIF etc formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';   
}
    if ($_FILES["img_link"]["size"] > 5000000) {
    $error[] = 'Sorry, your image is too large. Upload less than 500 KB in size.';
}
if(!isset($error))
{
move_uploaded_file($file,$target_file); 
$INSERT="INSERT INTO requestrenew(ticketno,ticketfile,stat)
VALUES('$ticketno','$target_file','Pending')";
if($conn->multi_query($INSERT)){

    echo"<script>
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
        <div class="row m-3"><h1>RENEW</h1></div>
        <form method="POST" enctype="multipart/form-data" class="row g-3">
          <div class="col-md-5">
            <label for="inputEmail4" class="form-label">Season Ticket No</label>
            <input type="text" class="form-control" name="ticketno" id="ticketno">
          </div>
          <div class="col-md-5">
            <label for="inputEmail4" class="form-label">Previous Pass file</label>
            <input type="file" class="form-control" name="img_link" id="ticketfile">
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>