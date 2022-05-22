<?php
session_start();
include 'conn/conn.php';

//perform query
$bil = 1;
$query = "SELECT * FROM account_detail WHERE verified = 1";
$result = mysqli_query($conn, $query);
$notempty = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <title>Login System - Admin Page</title>
</head>

<body>
    <nav id="navbar" class="">
        <div class="nav-wrapper">
            <!-- Navbar Logo -->
            <div class="logo">
                <!-- Logo Placeholder for Inlustration -->
                <a href="#home"><i class="fa fa-angellist"></i> Logo</a>
            </div>

            <!-- Navbar Links -->
            <ul id="menu">
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
    </nav>


    <!-- Menu Icon -->
    <div class="menuIcon">
        <span class="icon icon-bars"></span>
        <span class="icon icon-bars overlay"></span>
    </div>


    <div class="overlay-menu">
        <ul id="menu">
            <li><a href="#home">Home</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </div>
    <header>
        <nav>
            <ul class="nav_links">
                <li><a href="#"><i class="fa fa-user-circle"
                            style="margin-right: 10px;"></i><?php echo $_SESSION['username'];?></a></li>
                <div class="right-col"></div>
                <li><a href="clear-session.php">Log out <i class="fa fa-sign-out" style="margin-left: 10px;"> </a></i>
                </li>
            </ul>
        </nav>
    </header>

    <div class="content">
        <table>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Role</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result)){
                    $username = $row['username'];
                    $email = $row['user_email'];
                    $phone = $row['phone_num'];
                    $role = $row['role'];
            ?>
            <tr>
                <td><?php echo $bil;?></td>
                <td><?php echo $username;?></td>
                <td><?php echo $email;?></td>
                <td><?php echo $phone;?></td>
                <td><i class="fa-solid fa-badge-check"></i></td>
                <td><?php echo $role;?></td>
            </tr>
            <?php
                $bil++;
                }
            ?>
        </table>
    </div>
</body>

</html>