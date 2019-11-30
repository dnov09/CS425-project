
<?php
session_start();
require_once('connection.php');
$user=$_SESSION['username'];
unset($_SESSION['cards']);
$sql="select * from customer where username='".$user."' limit 1";
 $result=mysqli_query($con,$sql);

 if(mysqli_num_rows($result)==1){
    while($row = $result->fetch_assoc()) {
        $my_array=array($row["first"],$row["last"],str_replace(' ', '',$row["address"]));

    }
    $_SESSION['user']=$my_array;
    //echo implode(" ",$_SESSION['user']);
 }else{
    // $_SESSION['message']='Log in Credentials Failed';
    echo "Bros chai";
 }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Staff Login</title>
    <link href="css/account.css" rel="stylesheet" />


    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- update the version number as needed -->
    <script defer src="/__/firebase/7.2.0/firebase-app.js"></script>
    <!-- include only the Firebase features as you need -->
    <script defer src="/__/firebase/7.2.0/firebase-auth.js"></script>
    <script defer src="/__/firebase/7.2.0/firebase-database.js"></script>
    <script defer src="/__/firebase/7.2.0/firebase-messaging.js"></script>
    <script defer src="/__/firebase/7.2.0/firebase-storage.js"></script>
    <!-- initialize the SDK after all desired features are loaded -->
    <script defer src="/__/firebase/init.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
      $(document).ready(function() {
        $("button").click(function() {
          $("#div1").fadeIn();
          $("#div2").fadeIn("slow");
          $("#div3").fadeIn(3000);
        });
      });
    </script>
  </head>
  <body>

  <section class= "info">
      <h1><center>Account Information</center></h1>
    <form class="form" action="test.php" method="POST" enctype="multipart/form-data">
      <div class="imgcontainer">
        <a href="home.php"><img src="images/D3_logo.png" alt="Logo" class="Logo" width="150" height="150"/></a>
      </div>

      <div class="container">
        <label for="uname"><b>Username</b></label>
        <input
          type="text"
          id="name"
          placeholder="Enter Username"
          name="uname"
          value=<?=$_SESSION['username'] ?>
          readonly
          required
        />

        <label for="fname"><b>First Name</b></label>
        <input
          type="text"
          id="fname"
          placeholder="First Name"
          name="fname"
          value=<?=$_SESSION['user'][0] ?>
          readonly
          required
        />
        <label for="uname"><b>Last Name</b></label>
          <input
            type="text"
            id="lname"
            placeholder="Last Name"
            name="lname"
            value=<?=$_SESSION['user'][1] ?>
            readonly
            required
          />

        <label for="address"><b>Address (Street Address, City, State, Zipcode) </b></label>
        <input
          type="text"
          id="name"
          size="35"
          placeholder="Address"
          name="address"
          value=<?=$_SESSION['user'][2] ?>
          required
        />
<!-- should not be editable -->
        <label for="salary"><b>Salary</b></label>
        <input
          type="text"
          id="name"
          placeholder="Salary"
          name="salary"
          required
        />
      <!-- should not be editable -->
        <label for="job-title"><b>Job Title</b></label>
        <input
          type="text"
          id="job-title"
          placeholder="job-title"
          name="job-title"
          required
        />
        <a href="account.html"><button type="submit" id="save_changes" name="changes">Save changes</button></a>

      </div>
</section>
  </body>
</html>
