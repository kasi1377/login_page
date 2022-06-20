<?php
// include 'registration.php';
$host = "localhost";
$user = "root";
$password = "";
$db = "register";

// // // // // $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
$conn= mysqli_connect($host, $user, $password);
mysqli_select_db($conn, $db);
 ?> 
 




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    
    <title>Login Page</title>
</head>
<body> 
    <span class="fa fa-user user_icon" style= "font-size:50px;"></span>
    <div class="container"> 
      
        <form action="" method="post" >
            <h1> Login here </h1>
            <div class="user_box">
                <i class="fa fa-user" ></i>
                <input type="text" class="form-control" name="username" placeholder="Enter your username"  id ="username">
            </div>
            <div class="user_box">
                <i class="fa fa-key" style="display:flex;"></i>
                <input type="password" class="form-control" name="password" placeholder="Enter your password" id="show">
                <span onclick = "myFunction()"><i id="hide1" class="fa fa-eye"></i>
                <i id="hide2" class="fa fa-eye-slash"></i></span>
            </div>
            <button type="submit" class="btn-info" name="submit" value ="LOGIN" style="color: blueviolet;">LOGIN</button> 
            
            <Button type="button" class="btn btn-dark"><a href="registration.php" >Create an account</a></Button>
            <!-- <div class="show_psw">
                <label for="">show pas = "myFunction()"></div> -->
                <div > 
                <?php 
                    if(isset($_POST['username'])){
                        $Username = $_POST['username'];
                        $Password= $_POST['password'];
                        $sql = "select * from registertable1 where username='".$Username."' AND password = '".$Password."' limit 1";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result)==1){
                            // echo "Welcome!! You have successfully login.";
                            header('location:display.php');
                            exit();
                        }else{
                                echo "<p id ='error'> Try again!! You have entered incorrrect username or password</p>";
                                exit();
                            }
                    }
                ?>
            </div>
        </form>
    </div>
    <script type = "text/javascript">
        function myFunction(){
            var x  = document.getElementById('show');
            var y  = document.getElementById('hide1');
            var z  = document.getElementById('hide2');

            if(x.type == 'password'){
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
            }else{
                x.type ='password';
                y.style.display = "none";
                z.style.display = "block";

            }
        }
        function clearError(){
          document.getElementById('error').innerText = '';  
        }
        document.getElementById('username').addEventListener('input',clearError);
    </script>
</body>
</html>