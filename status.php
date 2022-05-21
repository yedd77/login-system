<?php

include 'conn/conn.php';

    //retrieve data from form signin-engine
    $username = $_REQUEST['username'];

    $query = "SELECT verified FROM account_detail WHERE username = '$username'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    
    if($row["verified"] == 1) {
        
        header('location:role.php?username=' .$username);
    } else {
        ?>
        <script>
            alert("Your account has not been approved. Please contact the administrator for approval.");
            location='index.html';
        </script>
        <?php
    }
?>