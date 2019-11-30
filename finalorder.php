<?php
session_start();
require_once('connection.php');

if(isset($_POST['order'])){
    if(isset($_SESSION['cartsession'])){
    $pids=array();
    // $user=mysqli_real_escape_string($con,trim($_POST['uname']));
    // $pass=mysqli_real_escape_string($con,trim($_POST['psw']));
    // $first=mysqli_real_escape_string($con,trim($_POST['fname']));
    // $last=mysqli_real_escape_string($con,trim($_POST['lname']));
    // $address=mysqli_real_escape_string($con,trim($_POST['address']));
    //list($month, $day, $year) = preg_split('[,]', $address);
    //echo "Month: $month; Day: $day; Year: $year<br />\n";
    foreach ($_SESSION['products'] as $bum){

        $sql="select * from stock where p_id='".$bum[4]."' ";
       $result=mysqli_query($con,$sql);
      
       if(mysqli_num_rows($result)>0){
          while($row = $result->fetch_assoc()) {
            //echo $row["p_id"];
             array_push($pids,array($row["p_id"],$row["quantity"]));
          }
          
       
       }else{
          echo "Bros chai";
       }
      }
    for($i=0;$i<count($_SESSION['cartsession']);$i++){

        $prod=$_SESSION['cartsession'][$i];
    foreach ($_SESSION['products'] as $bum){

 if($prod==$bum[0]){
   $id=$bum[4];
   foreach ($pids as $lum){

    if($id==$lum[0]){
        $final=$lum[1]-$_SESSION['pamounts'][$i];
        $sql="update stock set quantity='$final' where p_id='$id' ";
        $result=mysqli_query($con,$sql);
        if($result){
            //echo "<script>alert('Order Has been Successfully Placed');</script>";
        //   $_SESSION['username']=$user;
        //     sleep(1.5);
        //     header("Location: /dashboard/home.php");
        //     exit();
    
        }else{
            echo 'Failed';
        }
      
    }
   }
 }
}

      
    }
    $name=$_SESSION['username'];
    $total=$_SESSION['total'];
    $prevbal=0;
    $sql="select * from customer where username='$name' ";
    $result=mysqli_query($con,$sql);

    if(mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_assoc($result)) {
           $prevbal=$row['balance'];
        }

    }else{
        echo 'Failed';
    }

    $name=$_SESSION['username'];
    $total1=$_SESSION['total'];
    $total=$total1+$prevbal;
    $sql="update customer set balance='$total' where username='$name' ";
    $result=mysqli_query($con,$sql);

    if($result){
        unset($_SESSION[$_SESSION['username']]);
        unset($_SESSION['cartsession']);
        echo "<script>alert('Order Has been Successfully Placed');location.replace('/dashboard/home.php');</script>";
    //   $_SESSION['username']=$user;
    //     sleep(1.5);
    //     header("Location: /dashboard/home.php");
    //     exit();

    }else{
        echo 'Failed';
    }



}else{

    echo "<script>alert('Cart is Empty. Could not process order');location.replace('/dashboard/home.php');</script>";



    }
}
 
?>