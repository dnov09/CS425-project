<?php
session_start();
require_once('connection.php');
if(isset($_GET['product'])){
$_SESSION['cartsession']=$_GET['product'];}
if(isset($_GET['amount'])){
$amounts=$_GET['amount'];}
$_SESSION['cards']=array();
$user=$_SESSION['username'];
$c_id='';
$res=0;
$query= $_SESSION['cartsession'];
$my_array=array();
foreach ($query as $num){

$name=strtolower($num);
if(strpos($name,'-')==false){

}else{
  list($part1, $part2)=explode('-',$name);
$name=$part1.$part2;
}

$sql="select * from product where p_name='".$name."' ";
 $result=mysqli_query($con,$sql);

 if(mysqli_num_rows($result)>0){
    while($row = $result->fetch_assoc()) {
        array_push($my_array,array($row["p_name"],$row["p_type"],$row["price"],$row["p_image"]));

    }
    
 
 }else{
   
    echo "Bros chai";
 }
}

$_SESSION[$_SESSION['username']]=$my_array;
//$_SESSION['cart_p']=$my_array;
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
    echo "<h2><center>No Card on file Please Add one Below</center></h2>";
    $res=1;
   
 }
 
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Welcome to Firebase Hosting</title>
    
    <link rel="stylesheet" href="css/cart.css">
    <link href="css/home.css" rel="stylesheet" />
    
    <link href="css/checkout.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <script defer src="/__/firebase/7.2.0/firebase-app.js"></script>
    
    <script defer src="/__/firebase/7.2.0/firebase-auth.js"></script>
    <script defer src="/__/firebase/7.2.0/firebase-database.js"></script>
    <script defer src="/__/firebase/7.2.0/firebase-messaging.js"></script>
    <script defer src="/__/firebase/7.2.0/firebase-storage.js"></script>
   
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

  

    <div class="imgcontainer">
      <a href="home.php"><img src="images/D3_logo.png" alt="Logo" class="Logo" width="150" height="150" align= "left"/></a>
    </div>
    
    
    <section class= "checkout">
    
    <div class="row">
      <div class="col-75">
        <div class="container">
          <form action="/action_page.php">

            <div class="row">
              <div class="col-50">
                <h3>Billing Address</h3>
                <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                <input type="text" id="email" name="email" placeholder="john@example.com">
                <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                <!-- <label for="city"><i class="fa fa-institution"></i> City</label>
                <input type="text" id="city" name="city" placeholder="New York"> -->

                <!-- <div class="row">
                  <div class="col-50">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state" placeholder="NY">
                  </div>
                  <div class="col-50">
                    <label for="zip">Zip</label>
                    <input type="text" id="zip" name="zip" placeholder="10001">
                  </div>
                </div> -->
              </div>

              <div class="col-50">

                <h3>Payment</h3>
                <label for="fname">Accepted Cards</label>
                <div class="icon-container">
                  <i class="fa fa-cc-visa" style="color:navy;"></i>
                  <i class="fa fa-cc-amex" style="color:blue;"></i>
                  <i class="fa fa-cc-mastercard" style="color:red;"></i>
                  <i class="fa fa-cc-discover" style="color:orange;"></i>
                </div>
                
                
     

<br><br>
                <label for="cname">Name on Card</label>
                <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                <label for="ccnum">Credit card number</label>
                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                <!-- <label for="expmonth">Exp Month</label>
                <input type="text" id="expmonth" name="expmonth" placeholder="September"> -->

                <div class="row">
                  <div class="col-50">
                    <label for="expyear">Expiry Date</label>
                    <input type="text" id="expyear" name="expyear" placeholder="2018">
                  </div>
                  <div class="col-50">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="352">
                  </div>
                </div>
              </div>

            </div>
            
            <input type="submit" value="Checkout" class="btn">
          </form>
          <div class="HiddenBox">Please choose a card on file</div>
          <form id="card_stuff" action="checkout.php" method="POST" enctype="multipart/form-data"><select name="cards" class="cards">
          
 <?php
 for($i=0;$i<count($_SESSION['cards']);$i++){
 echo " 
 <option value=$i >".$_SESSION['cards'][$i][1]."</option>
 ";
}
  ?>
  
</select>

<input type="checkbox"  name="sameadr" id="check" > Shipping address same as billing
<br><br>
<input type="submit" value="Choose card"  class="button" name='populate' form="card_stuff">
<br>
              
          
<?php
  if($res==1){
    echo "<script type = 'text/javascript'> document.getElementsByClassName('HiddenBox')[0].style.visibility = 'hidden';
    document.getElementsByClassName('cards')[0].style.visibility = 'hidden';
    document.getElementsByClassName('button')[0].style.visibility = 'hidden';
    </script>";
  }

   ?></form>
   <?php
   if(isset($_POST['populate'])){
  $pos=trim($_POST['cards']);
  if(isset($_POST['sameadr'])){
  $add=trim($_POST['sameadr']);
  echo "<script type = 'text/javascript'>document.getElementById('adr').value = '".$_SESSION['cards'][$pos][4]."'; 
  document.getElementById('check').checked='true';  </script>";
  }
  echo "<script type = 'text/javascript'> var date ='".$_SESSION['cards'][$pos][2]."';console.log(date); 
  document.getElementById('cvv').value = ".$_SESSION['cards'][$pos][3].";
  document.getElementById('expyear').value = date.toString();
  document.getElementById('ccnum').value = '".$_SESSION['cards'][$pos][1]."';
  document.getElementById('cname').value = '".$_SESSION['fullname']."';
  document.getElementById('fname').value = '".$_SESSION['fullname']."';
    </script>";

}


?>
        </div>
      </div>
</section>
<section class="products">
  <div class="row">
  <?php foreach ($_SESSION[$_SESSION['username']] as $num) : ?>
   
    <?php
    echo " 
    <div class='column'>
    <div class='card'>
    <img src=$num[3] class='pimage' alt=$num[0] width='50' height='50'></a>
    <h1 class='pname'>$num[0]</h1>
    <h2 class='food'>Type:$num[1] </h2>
    <p class='price'>$num[2]</p>
    </div>
    <br>
    </div>
    
    ";

     ?>
      <?php endforeach ?>
      </div>
  
  </section>
    </div>
  </body>
</html>
