<?php
session_start();
require_once('connection.php');
$user=$_SESSION['username'];

$sql="select * from customer where username='".$user."' limit 1";
 $result=mysqli_query($con,$sql);

 if(mysqli_num_rows($result)==1){
    while($row = $result->fetch_assoc()) {
        $my_array=array($row["first"],$row["last"],str_replace(' ', '',$row["address"]));
        
    }
    $_SESSION['user']=$my_array;
    echo $_SESSION['user'][2];
 }else{
    // $_SESSION['message']='Log in Credentials Failed';
    echo "Bros chai";
 }
?>