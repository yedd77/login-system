<?php
session_start();
include 'conn/conn.php';

//retrieve data 
$userid = $_REQUEST['user_id'];

//perform deletion
$sql = "DELETE FROM account_detail WHERE user_id ='$userid'";

//update V2.3
if($conn->query($sql) === TRUE){
    ?>

        <script>
            alert("Account have been deleted");
        </script>
    <?php
    if($_SESSION['role'] == "admin"){
        ?><script>window.location='admin.php';</script><?php
    }   else{
        ?><script>window.location='index.html';</script><?php
    } 
} else {
    echo "Error:" .$sql . "<br>" .$conn->error;
}
$conn->close();
?>