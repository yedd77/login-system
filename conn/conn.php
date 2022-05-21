<?php
$conn = new mysqli("localhost" , "root" , "" , "account");

if($conn->connect_error){
    die ("connnection: " . $conn->connect_error);
}
?>