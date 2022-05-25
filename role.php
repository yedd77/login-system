<?php
session_start();
include 'conn/conn.php';

//retrieve username
$username = $_REQUEST['username'];

//performquery
$query = "SELECT * FROM account_detail
WHERE username = '$username'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);

$role = $row['role'];

//set data into session
$_SESSION['user_id'] = $row['user_id'];
$_SESSION['username'] = $row['username'];
$_SESSION['email'] = $row['user_email'];
$_SESSION['phone'] = $row['phone_num'];
$_SESSION['role'] = $role;

if($role == 'admin'){

    header('location:admin.php');

} else if ($role == 'lecturer') {

    header('location:lecturer.php');

} else if ($role == 'student'){

    header('location:student.php');

} else {
    ?>
    session_destroy();
    <script>
        alert("Invalid Request");
        location = 'index.html';
    </script>
    <?php
}
?>