<?php
require_once('connection.php');
$_SESSION['message']='';
if(isset($_POST['save'])){
    $user=mysqli_real_escape_string($con,trim($_POST['uname']));
    $pass=mysqli_real_escape_string($con,trim($_POST['psw']));


    $password=md5($pass);
    $sql="select * from customer where username='".$user."' AND password='".$password."' limit 1";
   // $sql="select * from customer where username='".$user."' limit 1";
    $result=mysqli_query($con,$sql);

    if(mysqli_num_rows($result)==1){
        $_SESSION['message']='Log in successful';
        sleep(1.5);
        header("Location: /dashboard/home.html");

    }else{
        $_SESSION['message']='Log in Credentials Failed';
        echo 'Log in Credentials Failed';
        exit();
    }

}
