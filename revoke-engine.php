<?php
session_start();
include 'conn/conn.php';

//retrieve data from from admin.php
$id = $_REQUEST['user_id'];

//perform update query
$sql = "UPDATE account_detail 
SET role = null ,
verified = 0
WHERE user_id ='$id'";

if($conn->query($sql) === TRUE){
    ?>
        <script>
            alert("Account have been revoked");
            window.location='admin.php';
      php  </script>
    <?php
    } else {
    echo "Error:" .$sql . "<br>" .$conn->error;
}
$conn->close();
?>