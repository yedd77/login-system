<?php
include 'conn/conn.php';

if(isset($_POST['login'])){

    //retrieve data from index
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];

    //perform query
    $query = "SELECT * FROM account_detail 
    WHERE username ='$username'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)>0){
        
        //fetch password from db
        $row = mysqli_fetch_assoc($result);
        $dbpass = $row['password'];

        //Verifies that a password matches a hash
        //ref: https://www.php.net/manual/en/function.password-hash.php
        if(password_verify($password , $dbpass)){
            header('location:status.php?username=' .$username);
        } else {
            ?>
            <script>
                alert("Invalid credential, please try again");
                window.location = "index.html";
            </script>
            <?php
        }
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