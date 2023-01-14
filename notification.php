<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h1>New Request Notification</h1>
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
    //  $num=mysqli_num_rows($result);
    //  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { 
    //      $date2 = $row['expire'];
    //      if(strtotime(date("Y/m/d")) >=strtotime($date2)) {
    //          echo "<h3>Your Pass is probabily Expire Soon Please Renew<h3>";
    //      }
    //       }
    //  }
    
    
    ?>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>