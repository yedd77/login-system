<?php
session_start();
include 'conn/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Login System - Admin Page</title>
</head>

<body>
    <div class="nav-bar">
        <nav>
            <ul class="nav_links">
                <li><a href="#"><?php echo $_SESSION['username'];?></a></li>
                <li class="right-col"><a href="clear-session.php">Log in</a></li>
            </ul>
        </nav>
    </div>
</body>

</html>