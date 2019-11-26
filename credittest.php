<?php
session_start();
//$_SESSION['username']='';
$user=$_SESSION['username'];
require_once('connection.php');
if(isset($_POST['changes'])){
   $cnumb=mysqli_real_escape_string($con,trim($_POST['cnumb']));
   $pos=mysqli_real_escape_string($con,trim($_POST['pos']));
   $expire=mysqli_real_escape_string($con,trim($_POST['expiration']));
   $cvv=mysqli_real_escape_string($con,trim($_POST['cvv']));
   $address=mysqli_real_escape_string($con,trim($_POST['address']));
    //list($month, $day, $year) = preg_split('[,]', $address);
    //echo "Month: $month; Day: $day; Year: $year<br />\n";
    //delete with key ccid
   
   
    $sql="update ccard set cc_number='$cnumb',cc_expiration='$expire',cvv='$cvv',address='$address' where cc_id='$pos' ";
    $result=mysqli_query($con,$sql);

    if($result){
      $_SESSION['username']=$user;
        sleep(1.5);
        header("Location: /dashboard/editcredit.php");
        exit();

    }else{
        echo 'Failed';
    }

}
if(isset($_POST['delete'])){
   $cnumb=mysqli_real_escape_string($con,trim($_POST['cnumb']));
   $pos=mysqli_real_escape_string($con,trim($_POST['pos']));
   $expire=mysqli_real_escape_string($con,trim($_POST['expiration']));
   $cvv=mysqli_real_escape_string($con,trim($_POST['cvv']));
   $address=mysqli_real_escape_string($con,trim($_POST['address']));
    //list($month, $day, $year) = preg_split('[,]', $address);
    //echo "Month: $month; Day: $day; Year: $year<br />\n";
    //delete with key ccid
   
   
    $sql="delete from ccard where cc_id='$pos' ";
    $result=mysqli_query($con,$sql);

    if($result){
      $_SESSION['username']=$user;
        sleep(1.5);
        header("Location: /dashboard/editcredit.php");
        exit();

    }else{
        echo 'Failed';
    }

}

?>