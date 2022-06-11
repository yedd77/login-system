<?php 
include 'conn/conn.php';
session_start();

if(isset($_REQUEST['Update'])){

    $id = $_SESSION['user_id'];
    $curpass = $_REQUEST['curpass'];
    $newpass = $_REQUEST['newpass'];
    $conpass = $_REQUEST['conpass'];

    $query = "SELECT * FROM account_detail WHERE user_id = '$id'";
    $result = mysqli_query($conn , $query);
    $row = mysqli_fetch_assoc($result);

    $dbpass = $row['password'];

    //verify password from db
    if(password_verify($curpass , $dbpass)){

        //check if new password entered is same
        if($newpass == $conpass){

            $hashed = password_hash($newpass , PASSWORD_BCRYPT);

            $sql = "UPDATE account_detail
            SET password = '$hashed'
            WHERE user_id = '$id'";

            //if data inserted success
            if ($conn->query($sql) === TRUE)  {
            ?>
    
            <script>
                alert('Your password have been changed');
            </script>
           
            <?php
             //destroy session 
             session_destroy();
             $conn->close();
            ?>
            <script>
                window.location = "index.html";
            </script>
            <?php
            //if data failed to insert
            } else {
                echo "Error:" .$sql . "<br>" .$conn->error;
            }
        
        //if password didn't match
        } else {
            ?>
            <script>
                alert("The password entered did not match");
                window.location="update-password.php";
            </script>
            <?php
        }
    
    //if password invalid
    } else {
        ?>
        <script>
            alert("invalid password, please try again");
            window.location="update-password.php";
        </script>
        <?php
    }
}

?>