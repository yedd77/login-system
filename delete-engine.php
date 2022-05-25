<?php
session_start();
include 'conn/conn.php';

//retrieve data from from admin.php
$userid = $_REQUEST['user_id'];

//perform deletion
$sql = "DELETE FROM account_detail WHERE user_id ='$userid'";

if($conn->query($sql) === TRUE){
    ?>
        <script>
            alert("Account have been deleted");
        </script>
    <?php
    if($_SESSION['role'] == "admin"){
        ?><script>window.location='admin.php'</script><?php
    } else if ($_SESSION['role'] == "student"){
        ?><script>window.location='index.html'</script><?php
    }  else if ($_SESSION['role'] == "lecturer"){
        ?><script>window.location='index.html'</script><?php
    }  else {
        ?>
            <script>
                alert("invalid Request");
                session_destroy();
                location = "index.html";
            </script>
        <?php
    }
} else {
    echo "Error:" .$sql . "<br>" .$conn->error;
}
$conn->close();
?>