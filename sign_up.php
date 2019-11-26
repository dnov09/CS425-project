<?php
require_once('connection.php');
if(isset($_POST['save'])){
    $user=mysqli_real_escape_string($con,trim($_POST['uname']));
    $pass=mysqli_real_escape_string($con,trim($_POST['psw']));
    $address=mysqli_real_escape_string($con,trim($_POST['address']));
    //list($month, $day, $year) = preg_split('[,]', $address);
    //echo "Month: $month; Day: $day; Year: $year<br />\n";
    $password=md5($pass);
    $sql="insert into customer (username,address,pword) values('$user','$address','$password')";
    $result=mysqli_query($con,$sql);

    if($result){
        sleep(1.5);
        header("Location: /dashboard/home.html");
        exit();

    }else{
        echo 'Failed';
    }

}




?>