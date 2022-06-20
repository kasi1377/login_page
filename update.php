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
$id = $_GET['updateid'];
$sql = "select * from democlass1 where id= $id";
$result= mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$Name = $row['name'];
$Email = $row['email'];
$Mobile = $row['mobile'];
$Password = $row['password'];


if(isset($_POST['submit'])){
    $Name=$_POST['name'];
    $Email=$_POST['email'];
    $Mobile=$_POST['mobile'];
    $Password=$_POST['password'];

    $sql ="UPDATE democlass1 set id =$id,name = '$Name',email= '$Email',mobile ='$Mobile',password='$Password' where id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        // echo "Updated successfully!!";
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
        <input type="text" class="form-control" placeholder="Enter your name" name ="name" autocomplete="off" value = <?php echo $Name;?>>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" placeholder="Enter your email" name ="email" autocomplete="off" value = <?php echo $Email;?>>
    </div>
    <div class="mb-3">
        <label class="form-label">Mobile</label>
        <input type="text" class="form-control" placeholder="Enter your mobile num" name ="mobile" autocomplete="off" value = <?php echo $Mobile;?>>
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" placeholder="Enter your password" name ="password" autocomplete="off" value = <?php echo $Password;?>>
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>

    </div>

    
  </body>
</html>

