<?php
session_start();
//$_SESSION['username']='';

require_once('connection.php');
if(isset($_GET['change'])){
   $name=mysqli_real_escape_string($con,trim($_GET['names']));
   $price=mysqli_real_escape_string($con,trim($_GET['price']));
   
    //list($month, $day, $year) = preg_split('[,]', $address);
    //echo "Month: $month; Day: $day; Year: $year<br />\n";
    //delete with key ccid
   
   
    $sql="update product set price='$price' where p_name='$name' ";
    $result=mysqli_query($con,$sql);

    if($result){
    //  $_SESSION['username']=$user;
    // while($row = $result->fetch_assoc()) {
    //     echo $row;

    // }
        sleep(1.5);
       header("Location: /dashboard/staff-home.php");
       exit();

    }else{
        echo 'Failed';
    }

}


?>