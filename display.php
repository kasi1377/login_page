<?php
include 'connect.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css">
</head>
<body>
   <div class="container">
       <H1 class="my-3">Dashboard</H1>

       <button class="btn btn-primary my-5"><a href="home.php" class ="text-light"> Add User</a> 
       <button class="btn btn-danger my-5 mr-3"><a href="login.php" class ="text-light"> Log Out</a>
        </button>
       <table class="table">
            <thead>
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile Num</th>
                    <th scope="col">Password</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <?php
                $sql = "select * from democlass1 ";
                $result = mysqli_query($conn, $sql);
                if ($result){
                    while($row= mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                        $Name = $row['name'];
                        $Email = $row['email'];
                        $Mobile = $row['mobile'];
                        $Password = $row['password'];
                        echo '
                        <tr>
                            <th scope="row">'.$id.'</th>
                            <td>'.$Name.'</td>
                            <td>'.$Email.'</td>
                            <td>'.$Mobile.'</td>
                            <td>'.$Password.'</td>
                            <td><button class = "btn btn-success"><a href="update.php?updateid='.$id.'" class ="text-light">Update</a></button>
                                <button class = "btn btn-danger"><a href="delete.php?deleteid='.$id.'" class ="text-light">Delete</a></button>
                            </td>
                        <tr>';
                    }
                
                }
            ?>
             
        </table>
        
   </div> 
</body>
</html>