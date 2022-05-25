<?php

include 'conn/conn.php';

if(isset($_POST['register'])){

    //retreive data from register.html
    $username = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $pass = $_REQUEST['password'];
    $cpass = $_REQUEST['cpassword'];

    if($pass == $cpass){

        //using bycrypt algo to store password into db
        //ref: https://www.php.net/manual/en/function.password-hash.php
        $hashed = password_hash($pass , PASSWORD_BCRYPT);

        //insert data into db
        $sql = "INSERT INTO account_detail
        (`username` , `user_email`, `phone_num` , `password`)
        VALUES ('$username' , '$email' , '$phone', '$hashed')";

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