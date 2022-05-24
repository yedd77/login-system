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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/48b4d892a8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <title>Login System - Student Page</title>
</head>

<body>
    <nav id="navbar" class="">
        <div class="nav-wrapper">
            <!-- Navbar Logo -->
            <div class="logo">
                <h1>Login System / Student Page <i style="margin-left: 10px;" class="fa-solid fa-graduation-cap"></i></h1>
            </div>
            <ul id="menu">
                <li><a href="#"><i class="fa fa-user-circle" style="margin-right: 10px;"></i><?php echo $_SESSION['username'];?></a></li>
                <li><a href="clear-session.php">LOG OUT<i class="fa fa-sign-out" style="margin-left: 10px;"></i></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-2">
        <h1>Student Details</h1>
        <label class="label" for="user">Username</label>
        <input type="text" value="<?php echo $_SESSION['username']?>" name="email" readonly>

        <label class="label" for="email">Email</label>
        <input type="text" value="<?php echo $_SESSION['email']?>" name="email" readonly>

        <label class="label" for="email">Phone Number</label>
        <input type="text" value="<?php echo $_SESSION['phone']?>" name="email" readonly>

        <input class="btn" type="submit" value="Delete Account">
        <input class="btn" type ="submit" value="Update Password">
    </div>

    
</body>
</html>