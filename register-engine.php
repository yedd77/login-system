<?php

include 'conn/conn.php';

if(isset($_POST['register'])){

    //retreive data from register.html
    $username = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['password'];
    $cpass = $_REQUEST['cpassword'];

    if($pass == $cpass){

        //insert data into db
        $sql = "INSERT INTO account_detail
        (`username` , `user_email` , `password`)
        VALUES ('$username' , '$email' , '$pass')";

        if($conn->query($sql) === TRUE){
            ?>
            <script>
                alert("Your registration have been accepted");
                window.location = "index.html";
            </script>
            <?php
        }

    } else {
        ?>
        <script>
            alert("Password didn't match, please try again");
            window.location = "register.html";
        </script>
        <?php
    }
    
}

?>