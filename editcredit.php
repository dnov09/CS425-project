<?php
session_start();
require_once('connection.php');
$user=$_SESSION['username'];
$_SESSION['cards']=array();
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
    echo "Bros chais";
 }
$sql="select * from ccard where c_id='".$c_id."'";
// $sql="select * from customer where username='".$user."' limit 1";
 $result=mysqli_query($con,$sql);
 $my_array=array();
 if(mysqli_num_rows($result)>0){
    while($row = $result->fetch_assoc()) {
        array_push($my_array,array($row["cc_id"],$row["cc_number"],$row["cc_expiration"],$row["cvv"],$row["address"])); 
    }
    $_SESSION['cards']=$my_array;
   
 }else{
    // $_SESSION['message']='Log in Credentials Failed';
    echo "<h1><center>No Card on file Please add one</center></h1>";
 }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Welcome to Firebase Hosting</title>
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
   
  <?php foreach ($_SESSION['cards'] as $num) : ?>
  <section class= "info">
      <h1><center>Edit or Delete Cards</center></h1>
    <form class="form" action="credittest.php" method="POST" enctype="multipart/form-data">
      <div class="imgcontainer">
        <a href="home.php"><img src="images/D3_logo.png" alt="Logo" class="Logo" width="150" height="150"/></a>
      </div>
      
        <label for="address"><b>Payment Address (Street Address, City, State, Zipcode) </b></label>
        <?php
     echo "<input type='text'
     id='address'
     size='35'
     placeholder='Address'
     name='address'
     value=$num[4]
     required>";
     
?>
<label for="pos" hidden><b>index </b></label>
 <?php
     echo "<input type='hidden'
     name='pos'
     value=$num[0]
     >";
     
?>

        <label for="ccardnum"><b>Credit card number</b></label>
        <?php
     echo "<input type='text'
     id='cnumb'
     size='35'
     placeholder='Credit Card Number'
     name='cnumb'
     value=$num[1]
     required>";
     
?>

        <label for="expiration"><b>Expiration date(mm/yy) </b></label>
        <?php  
        echo "<input
          type='text'
          id='expiration'
          placeholder='mm/yy'
          name='expiration'
          value=$num[2]
          required
        >";
        ?>
        <label for="cvv"><b>CVV </b></label>
        <?php 
        echo  "<input
          type='text'
          id='cvv'
          placeholder='cvv'
          name='cvv'
          value=$num[3]
          required
        >";
        ?> 
        <button type="submit" id="save_changes" name="changes">Save changes</button>
        <button type="submit" id="save_changes" name="delete">Delete</button>
        </form>
      </div>
      <br>
      
</section>
<?php endforeach ?>
  </body>
</html>
