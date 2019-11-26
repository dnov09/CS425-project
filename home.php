<?php
session_start();
require_once('connection.php');
$sql="select * from product ";
// $sql="select * from customer where username='".$user."' limit 1";
 $result=mysqli_query($con,$sql);
 $my_array=array();
 if(mysqli_num_rows($result)==5){
    while($row = $result->fetch_assoc()) {
        array_push($my_array,array($row["p_name"],$row["p_type"],$row["price"],$row["p_image"]));
        
    }
    $_SESSION['products']=$my_array;
  //  echo implode(" ",$_SESSION['products'][1]);
 }else{
    // $_SESSION['message']='Log in Credentials Failed';
    echo "Bros chai";
 }
?>
<!-- <!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" /> -->
  <title>Home</title>
  <link href="css/home.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/cart.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="cart.js" async></script>
  <!-- update the version number as needed -->
  <!-- <script defer src="/__/firebase/7.2.0/firebase-app.js"></script> -->
  <!-- include only the Firebase features as you need -->
  <!-- <script defer src="/__/firebase/7.2.0/firebase-auth.js"></script> -->
  <!-- <script defer src="/__/firebase/7.2.0/firebase-database.js"></script> -->
  <!-- <script defer src="/__/firebase/7.2.0/firebase-messaging.js"></script> -->
  <!-- <script defer src="/__/firebase/7.2.0/firebase-storage.js"></script> -->
  <!-- initialize the SDK after all desired features are loaded -->
  <!-- <script defer src="/__/firebase/init.js"></script> -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
      $("button").click(function () {
        $("#div1").fadeIn();
        $("#div2").fadeIn("slow");
        $("#div3").fadeIn(3000);
      });
    });
  </script>
</head>

<body>
  <div class="imgcontainer">
    <img src="images/D3_logo.png" alt="Logo" class="Logo" width="150" height="150" align="left" />
  </div>
  <form class="example" action="action_page.php" style="margin:auto;max-width:300px">
    <input type="text" placeholder="Search for products" name="search">
    <button type="submit" name="search"><i class="fa fa-search"></i></button>
  </form>
  <div class="user">Welcome , <?=$_SESSION['username'] ?> </div>
  <div class="alerter"><?=$_SESSION['username'] ?></div>
  <div class="staff-login">
    <a href="staff-login.php" alt="staff-login" height="80">Staff Login</a>
  </div>
  
  <div class="account">
    <a href="account.php" alt="account" height="80">Credit-Card(+)</a>
  </div>
  <div class="cart">
    <a href="#cart"><input type="image" src="images/cart_icon.png" alt="Logo" width="80" height="80"></a>
  </div>



  <section class="products">
    <!-- Row 1 of products -->
    <div class="row">
      <!-- banana: $0.50 -->
      <div class="column">
        <div class="card">
          <a class="nutrition" href="images/bananainfo.jpg">
            <img src=<?=$_SESSION['products'][0][3] ?> class="pimage" alt="Banana" width="80" height="80"></a>
          <h1 class="pname"><?=$_SESSION['products'][0][0] ?></h1>
          <h2 class="food">Type: <?=$_SESSION['products'][0][1] ?></h2>
          <p class="price"><?=$_SESSION['products'][0][2] ?></p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- apple: $0.75 -->
      <div class="column">
        <div class="card">
          <a class="nutrition" href="images/appleinfo.jpg">
            <img src="images/apple.jpg" class="pimage" alt="Apple" width="80" height="80">
          </a>
          <h1 class="pname">Apple</h1>
          <h2 class="food">Type: Food</h2>
          <p class="price">$0.75</p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- strawberry: $0.90 -->
      <div class="column">
        <div class="card">
          <a class="nutrition" href="images/strawberryinfo.jpg">
            <img src=<?=$_SESSION['products'][1][3] ?> class="pimage" alt="Strawberry" width="80" height="80">
          </a>
          <h1 class="pname"><?=$_SESSION['products'][1][0] ?></h1>
          <h2 class="food">Type: <?=$_SESSION['products'][1][1] ?></h2>
          <p class="price"><?=$_SESSION['products'][1][2] ?></p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- orange: $0.50 -->
      <div class="column">
        <div class="card">
          <a class="nutrition" href="images/orangeinfo.jpg">
            <img src=<?=$_SESSION['products'][2][3] ?> class="pimage" alt="Orange" width="80" height="80">
          </a>
          <h1 class="pname"><?=$_SESSION['products'][2][0] ?></h1>
          <h2 class="food">Type: <?=$_SESSION['products'][2][1] ?></h2>
          <p class="price"><?=$_SESSION['products'][2][2] ?></p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
    </div>
    <br>
    <!-- Row 2 of products -->
    <div class="row">
      <!-- 2% milk: $2.50 -->
      <div class="column">
        <div class="card">
          <a class="nutrition" href="images/2%milkinfo.jpg">
            <img src=<?=$_SESSION['products'][3][3] ?> class="pimage" alt="2% Milk" width="80" height="80">
          </a>
          <h1 class="pname"><?=$_SESSION['products'][3][0] ?></h1>
          <h2 class="food">Type: <?=$_SESSION['products'][3][1] ?></h2>
          <p class="price"><?=$_SESSION['products'][3][2] ?></p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- Whole milk: $2.75 -->
      <div class="column">
        <div class="card">
          <a class="nutrition" href="images/wholemilkinfo.jpg">
            <img src=<?=$_SESSION['products'][4][3] ?> class="pimage" alt="wholemilk" width="80" height="80">
          </a>
          <h1 class="pname"><?=$_SESSION['products'][4][0] ?></h1>
          <h2 class="food">Type: <?=$_SESSION['products'][4][1] ?></h2>
          <p class="price"><?=$_SESSION['products'][4][2] ?></p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- Half-and-half milk: $2.90 -->
      <div class="column">
        <div class="card">
          <a class="nutrition" href="images/half&halfinfo.jpg">
            <img src="images/half&half.jpg" class="pimage" alt="Half and Half" width="80" height="80">
          </a>
          <h1 class="pname">Half and <br>Half Milk</h1>
          <h2 class="drink">Type: Drink</h2>
          <p class="price">$2.90</p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- chocolatemilk: $3.50 -->
      <div class="column">
        <div class="card">
          <a class="nutrition" href="images/chocolatemilkinfo.jpg">
            <img src="images/chocolatemilk.jpg" class="pimage" alt="chocolatemilk" width="80" height="80">
          </a>
          <h1 class="pname">Chocolate<br> Milk</h1>
          <h2 class="drink">Type: Drink</h2>
          <p class="price">$3.50</p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
    </div>

    <br>
    <!-- Row 23of products -->
    <div class="row">
      <!-- Apple juice: $1.50 -->
      <div class="column">
        <div class="card">
          <a class="nutrition" href="images/applejuiceinfo.jpg">
            <img src="images/applejuice.jpeg" class="pimage" alt="apple juice" width="80" height="80">
          </a>
          <h1 class="pname">Apple juice</h1>
          <h2 class="drink">Type: Drink</h2>
          <p class="price">$1.50</p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- Orange juice: $1.50 -->
      <div class="column">
        <div class="card">
          <a class="nutrition" href="images/orangejuiceinfo.jpg">
            <img src="images/orangejuice.jpg" class="pimage" alt="orange juice" width="80" height="80">
          </a>
          <h1 class="pname">Orange juice</h1>
          <h2 class="drink">Type: Drink</h2>
          <p class="price">$1.50</p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- Pineapple juice: $1.50 -->
      <div class="column">
        <div class="card">
          <a class="nutrition" href="images/pineapplejuiceinfo.jpg">
            <img src="images/pineapplejuice.jpg" class="pimage" alt="pineapple juice" width="80" height="80">
          </a>
          <h1 class="pname">Pineapple juice</h1>
          <h2 class="drink">Type: Drink</h2>
          <p class="price">$1.50</p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- chocolatemilk: $1.50 -->
      <div class="column">
        <div class="card">
          <a class="nutrition" href="images/grapejuiceinfo.jpg">
            <img src="images/grapejuice.jpg" class="pimage" alt="grape juice" width="80" height="80">
          </a>
          <h1 class="pname">Grape juice</h1>
          <h2 class="drink">Type: Drink</h2>
          <p class="price">$1.50</p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
    </div>

    <br>
    <!-- Row 4 of products -->
    <div class="row">
      <!-- White bread: $2.25 -->
      <div class="column">
        <div class="card">
          <img src="images/whitebread.jpg" class="pimage" alt="White bread" width="80" height="80">
          <h1 class="pname">White<br> bread</h1>
          <h2 class="food">Type: Food</h2>
          <p class="price">$2.25</p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- Wheat bread: $2.50 -->
      <div class="column">
        <div class="card">
          <img src="images/wheatbread.jpg" class="pimage" alt="wheatbread" width="80" height="80">
          <h1 class="pname">Wheat<br> bread</h1>
          <h2 class="food">Type: Food</h2>
          <p class="price">$2.50</p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- Multi-grain bread: $2.90 -->
      <div class="column">
        <div class="card">
          <img src="images/multigrainbread.jpg" class="pimage" alt="Multi-grain bread" width="80" height="80">
          <h1 class="pname">Multigrain bread</h1>
          <h2 class="food">Type: Food</h2>
          <p class="price">$2.90</p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- bananabread: $3 -->
      <div class="column">
        <div class="card">
          <img src="images/bananabread.jpg" class="pimage" alt="bananabread" width="80" height="80">
          <h1 class="pname">Banana<br> bread</h1>
          <h2 class="food">Type: Food</h2>
          <p class="price">$3.00</p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
    </div>

    <br>
    <!-- Row 5 of products -->
    <div class="row">
      <!-- Beer: $2.00-->
      <div class="column">
        <div class="card">
          <a class="alcoholcontent" href="images/beerinfo.jpg">
            <img src="images/beer.jpg" class="pimage" alt="Beer" width="80" height="80">
          </a>
          <h1 class="pname">Beer</h1>
          <h2 class="alcoholic-drink">Type: Alcoholic Drink</h2>
          <p class="price">$2.00</p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- Vodka: $20.00 -->
      <div class="column">
        <div class="card">
          <a class="alcoholcontent" href="images/vodkainfo.jpg">
            <img src="images/vodka.jpg" class="pimage" alt="vodka" width="80" height="80">
          </a>
          <h1 class="pname">Vodka</h1>
          <h2 class="alcoholic-drink">Type: Alcoholic Drink</h2>
          <p class="price">$20.00</p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- Whiskey: $15.00-->
      <div class="column">
        <div class="card">
          <a class="alcoholcontent" href="images/whiskeyinfo.jpg">
            <img src="images/whiskey.jpg" class="pimage" alt="whiskey" width="80" height="80">
          </a>
          <h1 class="pname">Whiskey</h1>
          <h2 class="alcoholic-drink">Type: Alcoholic Drink</h2>
          <p class="price">$15</p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- Rum: $18.00 -->
      <div class="column">
        <div class="card">
          <a class="alcoholcontent" href="images/ruminfo.jpg">
            <img src="images/rum.jpg" class="pimage" alt="rum" width="80" height="80">
          </a>
          <h1 class="pname">Rum</h1>
          <h2 class="alcoholic-drink">Type: Alcoholic Drink</h2>
          <p class="price">$18.00</p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
    </div>
  </section>

  <!-- section for cart -->
  <section class="container-content-section">
    <h2 class="section-header"><a name="cart">CART</a></h2>
    <div class="cart-row">
      <span class="cart-item cart-header cart-column">ITEM</span>
      <span class="cart-price cart-header cart-column">PRICE</span>
      <span class="cart-quantity cart-header cart-column">QUANTITY</span>
    </div>
    <div class="cart-items">

    </div>
    <div class="cart-total">
      <strong class="cart-total-title">Total</strong>
      <span class="cart-total-price">$0</span>
    </div>
    <a href="checkout.html"><button class="btn-checkout" type="button">Go to checkout</button></a>
  </section>
  </div>
</body>
<!-- 
</html> -->
