<?php
include 'connect.php';
// $host = "localhost";
// $user = "root";
// $password = "";
// $name ="";
// $email ="";
// $mobile ="";
// $db = "demo";

// $conn = new mysqli($name, $email, $password, $mobile,$db) or die("Connect failed: %s\n". $conn -> error);
// $conn= mysqli_connect($host, $user, $password);
// mysqli_select_db($conn, $db);

if(isset($_POST['submit'])){
    $Name=$_POST['name'];
    $Email=$_POST['email'];
    $Mobile=$_POST['mobile'];
    $Password=$_POST['password'];

    $sql ="insert into  democlass1 (name,email,mobile,password) values
    ('$Name','$Email','$Mobile','$Password')";
    $result = mysqli_query($conn, $sql);
    if($result){
        // echo "Data inserted successfully!!"
        header('location:display.php');
    }
    else{
        die(mysqli_error($conn));
    }

}

?>

<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css">
    <title>Crud Operation</title>
  </head>
  <body>
    <div class="container my-5">
    <form method="post">
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Enter your name" name ="name" autocomplete="off">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" placeholder="Enter your email" name ="email" autocomplete="off">
    </div>
    <div class="mb-3">
        <label class="form-label">Mobile</label>
        <input type="text" class="form-control" placeholder="Enter your mobile num" name ="mobile" autocomplete="off">
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" placeholder="Enter your password" name ="password" autocomplete="off">
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

    </div>

    
  </body>
</html>

