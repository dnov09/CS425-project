<?php
session_start();
$_SESSION['username']='';
require_once('connection.php');
if(isset($_POST['save'])){
    $user=mysqli_real_escape_string($con,trim($_POST['uname']));
    $pass=mysqli_real_escape_string($con,trim($_POST['psw']));
    $first=mysqli_real_escape_string($con,trim($_POST['fname']));
    $last=mysqli_real_escape_string($con,trim($_POST['lname']));
    $address=mysqli_real_escape_string($con,trim($_POST['address']));
    //list($month, $day, $year) = preg_split('[,]', $address);
    //echo "Month: $month; Day: $day; Year: $year<br />\n";
    $password=md5($pass);
    $sql="insert into customer (username,address,pword,first,last) values('$user','$address','$password','$first','$last')";
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

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sign up</title>
    <link href="css/signin.css" rel="stylesheet" />
    <script src="login.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  </head>
  <body>
    <form class="form" action="signup.php" method="POST" enctype="multipart/form-data">
    <div class="imgcontainer">
        <img src="images/D3_logo.png" alt="Logo" class="Logo" width="150" height="150"/>
      </div>
      <div class="container">
        <label for="uname"><b>Create a username</b></label>
        <input
          type="text"
          id="name"
          placeholder="Enter Username"
          name="uname"
          required
        />
    

          <label for="fame"><b>Enter First Name</b></label>
          <input
            type="text"
            id="fname"
            placeholder="Enter First Name"
            name="fname"
            required
          />
          
            <label for="lname"><b>Enter Last Name</b></label>
            <input
              type="text"
              id="lname"
              placeholder="Enter Last Name"
              name="lname"
              required
            />
        <label for="psw"><b>Create a Password</b></label>
        <input
          type="password"
          placeholder="Enter Password"
          name="psw"
          id="pswd"
          required
        />

        <label for="address"><b>Address (Street Address, City, State, Zipcode) </b></label>
        <input
          type="text"
          id="address"
          placeholder="Enter address"
          name="address"
          required
        />
        <button type="submit" id="sign" name='save'>Signup</button>
        <label>
          <input type="checkbox" checked="checked" name="remember" /> Remember
          me
        </label>
      </div>
    </form>
    </body>
    </html>
      <!-- <div class="container" style="background-color:black">
        <button type="button" class="cancelbtn">Cancel</button>
      </div>

    <script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-app.js"></script>

    If you enabled Analytics in your project, add the Firebase SDK for Analytics
    <script src="/__/firebase/7.2.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-analytics.js"></script>

   
    <script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-firestore.js"></script>

  

  

  
