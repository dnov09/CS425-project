<?php
require_once('connection.php');
if(isset($_POST['save'])){
    $user=mysqli_real_escape_string($con,trim($_POST['uname']));
    $pass=mysqli_real_escape_string($con,trim($_POST['psw']));
    $address=mysqli_real_escape_string($con,trim($_POST['address']));
    $password=md5($pass);
    $sql="insert into customer ("
}




?>