<?php
    include '../config.php';
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
?>

<?php 
$sql = "DELETE FROM `db_employees` WHERE emp_id = $id";
mysqli_query($conn,$sql);
header("location:index.php");
mysqli_close($conn);
?>