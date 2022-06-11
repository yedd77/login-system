<?php
include 'conn/conn.php';

if(isset($_REQUEST['verify'])){

    //retrieve data from from admin.php
    $userid = $_REQUEST['user_id'];
    $role = $_REQUEST['roleOpt'];

    if ($role == 1){

        $sql = "UPDATE account_detail
        SET verified = 1,
        role = 'lecturer'
        WHERE user_id = '$userid'";

    } else if ($role == 2) {

        $sql = "UPDATE account_detail
        SET verified = 1,
        role = 'student'
        WHERE user_id = '$userid'";

    } else if ($role == 3) {

        $sql = "UPDATE account_detail
        SET verified = 1,
        role = 'admin'
        WHERE user_id = '$userid'";

    } else {
        ?>
        <script>
            alert("You did not select role for user, please try again");
            location = "admin.php"
        </script>
        <?php
    }

    //if data inserted success
    if ($conn->query($sql) === TRUE)  {
    ?>

    <script>
        alert('User account have been verified');
        window.location='admin.php';</script>

    <?php
    //if data failed to insert
    } else {
        echo "Error:" .$sql . "<br>" .$conn->error;
    }
    $conn->close();
}  
?>
