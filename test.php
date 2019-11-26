<?php
session_start();
require_once('connection.php');
$user=$_SESSION['username'];
$c_id='';
$sql="select * from customer where username='".$user."' limit 1";
$result=mysqli_query($con,$sql);

 if(mysqli_num_rows($result)==1){
    while($row = $result->fetch_assoc()) {
        $c_id=$row["c_id"];
    }
    //echo $c_id;
    //echo implode(" ",$_SESSION['user']);
 }else{
    // $_SESSION['message']='Log in Credentials Failed';
    echo "Bros chai";
 }
if(isset($_POST['changes'])){
    $cnumb=mysqli_real_escape_string($con,trim($_POST['cnumb']));
    $expire=mysqli_real_escape_string($con,trim($_POST['expiration']));
    $cvv=mysqli_real_escape_string($con,trim($_POST['cvv']));
    $address=mysqli_real_escape_string($con,trim($_POST['address']));
    //list($month, $day, $year) = preg_split('[,]', $address);
    //echo "Month: $cnumb; Day: $expire; Year: $cvv<br />\n";
    $sql="insert into ccard (c_id,cc_number,cc_expiration,cvv,address) values('$c_id','$cnumb','$expire','$cvv','$address')";
    $result=mysqli_query($con,$sql);

    if($result){
      $_SESSION['username']=$user;
        sleep(1.5);
        header("Location: /dashboard/home.php");
        exit();

    }else{
        echo 'Failed';
     }
   }
?>