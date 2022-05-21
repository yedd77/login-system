<?php
include 'conn/conn.php';

if(isset($_POST['login'])){

    //retrieve data from index
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];

    //perform query
    $query = "SELECT * FROM account_detail 
    WHERE username ='$username'
    AND password = '$password'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)>0){
        
        header('location:status.php?username=' .$username);

    } else {
        
        ?>
        <script>
            alert("Your account has not been registered. Please register an account first.");
            window.location = "register.html";
        </script>
        <?php
    }
}
?>