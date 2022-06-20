<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id= $_GET['deleteid'];

    $sql = "DELETE FROM democlass1 WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result){
        // echo "Record deleted successfully";
        header('location:display.php');
    }else{
        echo "Error deleting record: " . mysqli_error($conn);
        // die(mysqli_error($conn));
    }
    
}


?>