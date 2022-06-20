<?php
// include 'connect.php';
$host = "localhost";
$user = "root";
$password = "";
$db = "register";

// // $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    

    $conn= mysqli_connect($host, $user, $password);
    mysqli_select_db($conn, $db);


    if(isset($_POST['create'])){
        $Username=$_POST['username'];
        $Email=$_POST['email'];
        $Mobile=$_POST['mobile'];
        $Password=$_POST['password'];
        $encrypted_pwd = md5($Password);
            
        $sql ="insert into  registertable1 (username,email,mobile,password) values
        ('$Username','$Email','$Mobile','$encrypted_pwd')";
        $result = mysqli_query($conn, $sql);
        if($result){
            // echo "Data inserted successfully!!";
            header('location:login.php');
        } 
        else{
            die(mysqli_error($conn));
    }
    

}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Registration page</title>

</head>
<body>
    <div class="container-fluid">
    <form action="" method="post" >
        
        <h1> Create an account</h1>
        <div class="user">
            <label for=""> UserName: <br>
                <input type="text" class="form-control" name="username" required>
            </label>
        </div>
        <div class="user">
            <label for=""> Email: <br>
                <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
            </label>
        </div>
        <div class="user">
            <label for=""> Mobile Num: <br>
                <input type="text" class="form-control" name="mobile" required>
            </label>
        </div>
        <div class="user">
            <label for=""> Password: <br>
                <input id="input-pwd" type="text" class="form-control" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            </label>
        </div>
        <div class="user">
            <label for="">Confirm  Password: <br>
                <input id = "input-cpwd" class="form-control" type="text" name="cpassword" required>
            </label>
        </div> <br>
        <div class ="g-recaptcha" data-sitekey ="6Lf9HYUgAAAAACE9ojUB1fjYYJ9-CQT_v1Ssl4qx"></div>
        <input type="submit" class="btn btn-light" name="create" value ="create" style="color: blueviolet;" >
        <button class="btn btn-dark"><a href="login.php" class ="text-light"> Back to  login</a>
    </form>
    </div>
    <!-- <div id="message">
        <h3>Password must contain the following:</h3>
        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
        <p id="number" class="invalid">A <b>number</b></p>
        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
    </div> -->
    <script>
        const password = document.getElementById("input-cpwd"); //selects confirm password input field
        const submitBtn = document.querySelector('button[type="create"]'); //selects submit button
        let error = document.createElement("span"); //creates a span object that will hold error message
        error.id = "error"; //sets id to the error message span object

        const onChangeConfirmPassword = password.addEventListener("input", (event) => { //event occurs when user types inside the confirm password input box
            if (document.getElementById("input-pwd").value != event.target.value) { //compares password input field with confirm password field
                error.innerText = "Error: Passwords do not match!!";
                 //sets error message
                password.after(error); //inserts the error message span object into the website
                submitBtn.style.display = 'none'; //hides submit button

            } else {
                submitBtn.style.display = 'block'; //displays submit button
                error.innerText = ""; //clears error messages
            }
        });

        var myInput = document.getElementById("password");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if(myInput.value.match(lowerCaseLetters)) {  
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }
        
        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if(myInput.value.match(upperCaseLetters)) {  
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if(myInput.value.match(numbers)) {  
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }
        
        // Validate length
        if(myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
        }
    </script>
</body>
</html>