<?php
session_start();
require_once('connection.php');
$_SESSION['message']='';
$_SESSION['username']='';
$_SESSION['fullname']='';

if(isset($_POST['save'])){
  $user=mysqli_real_escape_string($con,trim($_POST['uname']));
  $pass=mysqli_real_escape_string($con,trim($_POST['psw']));


  $password=md5($pass);
  $sql="select * from customer where username='".$user."' AND pword='".$password."' limit 1";
 // $sql="select * from customer where username='".$user."' limit 1";
  $result=mysqli_query($con,$sql);

  if(mysqli_num_rows($result)==1){
    $row = $result->fetch_assoc();
       $_SESSION['username']=$user;
       $_SESSION['fullname']=$row["first"]." ".$row["last"];
      $_SESSION['message']='Log in successful';
      sleep(1.5);
      header("Location: /dashboard/home.php");
      exit();

  }else{
      $_SESSION['message']='Log in Credentials Failed';
  }

}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="css/signin.css" rel="stylesheet" />
    <title>User Login</title>

    <script src="login.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  </head>
  <body>
    <form class="form" action="loginpage.php" method="POST" enctype="multipart/form-data">
      <div class="imgcontainer">
        <a href="index.html"><img src="images/D3_logo.png" alt="Logo" class="Logo" width="150" height="150"/></a>
      </div>
<div class="alerter"><?=$_SESSION['message'] ?></div>
      <div class="container">
        <label for="uname"><b>Username</b></label>
        <input
          type="text"
          id="name"
          placeholder="Enter Username"
          name="uname"
          required
        />

        <label for="psw"><b>Password</b></label>
        <input
          type="password"
          placeholder="Enter Password"
          name="psw"
          id="pswd"
          required
        />

        <button type="submit" id="sign" name='save'>Login</button>
        <a href="signup.php">Dont have an Account? Sign up</a>
        <br>
        <label>
          <input type="checkbox" checked="checked" name="remember" /> Remember
          me
        </label>
      </div>

      <!-- <div class="container" style="background-color:black">
        <button type="button" class="cancelbtn">Cancel</button>
      </div>
    </form> -->
    <!-- <script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-app.js"></script> -->

    <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
    <script src="/__/firebase/7.2.0/firebase-app.js"></script>
    <!-- <script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-analytics.js"></script> -->

    <!-- Add Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-firestore.js"></script>

    <!-- <script src="/__/firebase/init.js"></script> -->
    
  </body>
</html>
