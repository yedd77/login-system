<?php
include 'conn/conn.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/48b4d892a8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <title>Login System - Update Password</title>
</head>

<body>
    <nav id="navbar" class="">
        <div class="nav-wrapper">
            <!-- Navbar Logo -->
            <div class="logo">
                <h1>Login System / Update Password</h1>
            </div>
            <ul id="menu">
                <li><a href="#"><i class="fa fa-user-circle"
                            style="margin-right: 10px;"></i><?php echo $_SESSION['username'];?></a></li>
                <li><a href="clear-session.php">LOG OUT<i class="fa fa-sign-out" style="margin-left: 10px;"></i></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-3">
        <h1>Update Password</h1>
        <form action="update-pass-engine.php?user_id=<?php echo $_SESSION['user_id'];?>" method="POST">

            <label class="label" for="curpas">Current Password</label>
            <input type="password" placeholder="enter current password" name="curpass" required>

            <label class="label" for="newpass">New Password</label>
            <input type="password" placeholder="enter new password" name="newpass" required>

            <label class="label" for="conpas">Re-enter New Password</label>
            <input type="password" placeholder="re-enter current password" name="conpass" required>

            <input name="Update" type="submit" class="submit" value="update">
        </form>
    </div>
</body>

</html>