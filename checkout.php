<?php
session_start();
require_once('connection.php');
$_SESSION['cartsession']=$_GET['product'];
$query= $_SESSION['cartsession'];
$my_array=array();
foreach ($query as $num){
$name=strtolower($num);
if(strpos($name,'-')==false){

}else{
  list($part1, $part2)=explode('-',$name);
$name=$part1.' '.$part2;
}

$sql="select * from product where p_name='".$name."' ";
 $result=mysqli_query($con,$sql);

 if(mysqli_num_rows($result)>0){
    while($row = $result->fetch_assoc()) {
        array_push($my_array,array($row["p_name"],$row["p_type"],$row["price"],$row["p_image"]));

    }
    
  //  echo implode(" ",$_SESSION['products'][1]);
 }else{
    // $_SESSION['message']='Log in Credentials Failed';
    echo "Bros chai";
 }
}
$_SESSION['cart_p']=$my_array;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Welcome to Firebase Hosting</title>
    <link href="css/checkout.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/cart.css">
    <link href="css/home.css" rel="stylesheet" />
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
      <a href="home.html"><img src="images/D3_logo.png" alt="Logo" class="Logo" width="150" height="150" align= "left"/></a>
    </div>
    <form class="example" action="action_page.php" method="GET" style="margin:auto;max-width:300px">
    <input type="text" placeholder="Search for products" name="search">
    <button type="submit" name="searcher"><i class="fa fa-search"></i></button>
  </form>
    <section class="products">
  <div class="row">
  <?php foreach ($_SESSION['cart_p'] as $num) : ?>
   
    <?php
    echo " 
    <div class='column'>
    <div class='card'>
    <img src=$num[3] class='pimage' alt=$num[0] width='80' height='80'></a>
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
                <label for="city"><i class="fa fa-institution"></i> City</label>
                <input type="text" id="city" name="city" placeholder="New York">

                <div class="row">
                  <div class="col-50">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state" placeholder="NY">
                  </div>
                  <div class="col-50">
                    <label for="zip">Zip</label>
                    <input type="text" id="zip" name="zip" placeholder="10001">
                  </div>
                </div>
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
                <label for="cname">Name on Card</label>
                <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                <label for="ccnum">Credit card number</label>
                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                <label for="expmonth">Exp Month</label>
                <input type="text" id="expmonth" name="expmonth" placeholder="September">

                <div class="row">
                  <div class="col-50">
                    <label for="expyear">Exp Year</label>
                    <input type="text" id="expyear" name="expyear" placeholder="2018">
                  </div>
                  <div class="col-50">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="352">
                  </div>
                </div>
              </div>

            </div>
            <label>
              <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
            </label>
            <input type="submit" value="Checkout" class="btn">
          </form>
        </div>
      </div>
</section>
    </div>
  </body>
</html>
