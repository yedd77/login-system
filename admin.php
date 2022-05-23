<?php
session_start();
include 'conn/conn.php';

//perform query
$bil = 1;
$query = "SELECT * FROM account_detail WHERE verified = 1";
$result = mysqli_query($conn, $query);
$notempty = mysqli_num_rows($result);

$num = 1;
$query2 = "SELECT * FROM account_detail WHERE verified = 0";
$result2 = mysqli_query($conn, $query2);
$notempty2 = mysqli_num_rows($result);
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
    <title>Login System - Admin Page</title>
</head>

<body>
    <nav id="navbar" class="">
        <div class="nav-wrapper">
            <!-- Navbar Logo -->
            <div class="logo">
                <h1>Login System / Admin Page</h1>
            </div>
            <ul id="menu">
                <li><a href="#"><i class="fa fa-user-circle" style="margin-right: 10px;"></i><?php echo $_SESSION['username'];?></a></li>
                <li><a href="clear-session.php">Log Out<i class="fa fa-sign-out" style="margin-left: 10px;"></i></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="content">
        <table>
            <tr>
                <th class="table-header" colspan="2">Verified User</th>
            </tr>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Verified User</th>
                <th>Role</th>
                <th>Delete</th>
                <th>Revoke verification</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result)){
                    $userid = $row['user_id'];
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
                <td><i class="fa-solid fa-circle-check"></i></td>
                <td><?php echo $role;?></td>
                <td><a href="delete-engine.php?user_id=<?php echo $userid?>" class="revoke"><i
                            class="fa-solid fa-trash-can"></i>Delete</a></td>
                <td><a href="revoke-engine.php?user_id=<?php echo $userid?>"><i class="fa-solid fa-key"></i>Revoke</a>
                </td>
            </tr>
            <?php
            $bil++;
            } //loop end

            //shows number of data displayed
            if($notempty != 0){
            ?>
            <tr>
                <td colspan="9"> Showing result of <?php echo $bil-1; ?> of data from database</td>
            </tr>
            <?php
            }
            //if data not existed inside database
            if($notempty == 0){
            ?>
            <tr>
                <td colspan="9">No data inside the database</td>
            </tr>
            <?php
            }?>
        </table>

        <table>
            <tr>
                <th class="table-header" colspan="2">User</th>
            </tr>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Verified User</th>
                <th>Delete</th>
                <th>Verify Registration</th>
            </tr>
            <?php
                while($row2 = mysqli_fetch_assoc($result2)){
                    $userid2 = $row2['user_id'];
                    $username2 = $row2['username'];
                    $email2 = $row2['user_email'];
                    $phone2 = $row2['phone_num'];
            ?>
            <tr>
                <td><?php echo $num;?></td>
                <td><?php echo $username2;?></td>
                <td><?php echo $email2;?></td>
                <td><?php echo $phone2;?></td>
                <td><i class="fa-solid fa-xmark"></i></td>
                <td><a href="delete-engine.php?user_id=<?php echo $userid?>" class="revoke"><i class="fa-solid fa-trash-can"></i>Delete</a></td>
                <td class="revoke"><a href="#login-show?user_id=<?php echo $username2 ?>" role="button"><i class="fa-solid fa-check"></i>Verify</a></td>
            </tr>
            <?php
            $num++;
            } //loop end

            //shows number of data displayed
            if($notempty != 0){
            ?>
            <tr>
                <td colspan="7"> Showing result of <?php echo $num-1; ?> of data from database</td>
            </tr>
            <?php
            }
            //if data not existed inside database
            if($notempty == 0){
            ?>
            <tr>
                <td colspan="7">No data inside the database</td>
            </tr>
            <?php
            }?>
        </table>
    </div>

    <div class="card login-form" id="login-show?user_id">
        <div class="card-body">
            <form>
                <div class="form-group">
                    <h1>Verify for <?php?></h1>
                    <label for="name">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>