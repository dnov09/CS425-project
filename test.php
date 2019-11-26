<?php
session_start();
require_once('connection.php');
$sql="select * from product ";
// $sql="select * from customer where username='".$user."' limit 1";
 $result=mysqli_query($con,$sql);
 $my_array=array();
 if(mysqli_num_rows($result)==5){
    while($row = $result->fetch_assoc()) {
        array_push($my_array,array($row["p_name"],$row["p_type"],$row["price"],$row["p_image"]));
        
    }
    $_SESSION['products']=$my_array;
    echo implode(" ",$_SESSION['products'][1]);
 }else{
    // $_SESSION['message']='Log in Credentials Failed';
    echo "Bros chai";
 }
?>