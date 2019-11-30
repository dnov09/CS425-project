<?php
session_start();
require_once('connection.php');
if(isset($_SESSION['flag'])){
if($_SESSION['flag']){
  $res="";
  $amt="";
  foreach ($_SESSION['faulter'] as $bum){
  $res=$res.$bum.",";
}
foreach ($_SESSION['faultercount'] as $bum){
  $amt=$amt.$bum.",";
}
echo "<script>alert('(".$res.") amount in cart is more than in stock Please reduce amount. Amounts are respectively (".$amt.")');</script>";
  $_SESSION['flag']=False;
}
}
$_SESSION['products']=array();
//$remem=$_SESSION['cart_p'];
$sql="select * from product ";
// $sql="select * from customer where username='".$user."' limit 1";
 $result=mysqli_query($con,$sql);
 $my_array=array();
 if(mysqli_num_rows($result)>0){
    while($row = $result->fetch_assoc()) {
        array_push($my_array,array($row["p_name"],$row["p_type"],$row["price"],$row["p_image"],$row["p_id"]));

    }
    $_SESSION['products']=$my_array;
  //  echo implode(" ",$_SESSION['products'][1]);
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
  <title><?=$_SESSION['username'] ?> 's Homepage</title>
  <link href="css/home.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/cart.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="cart.js" ></script>


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
  <form class="example" action="action_page.php" method="GET" style="margin:auto;max-width:300px">
    <input type="text" placeholder="Search for products" name="search">
    <button type="submit" name="searcher"><i class="fa fa-search"></i></button>
  </form>
  <div class="user">Welcome , <?=$_SESSION['username'] ?> </div>
  <div class="alerter"><?=$_SESSION['username'] ?></div>
  <div class="logout">
    <a href="loginpage.php" alt="account" height="80">Log out</a>
  </div>
  <div class="account">
    <a href="account.php" alt="account" height="80">My Account</a>
  </div>
  
  <div class="cart">
    <a href="#cart"><input type="image" src="images/cart_icon.png" alt="Logo" width="50" height="50"></a>
    <div class="cart-count" style="display: none;"></div>
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
            <img src=<?=$_SESSION['products'][5][3] ?> class="pimage" alt="Apple" width="80" height="80">
          </a>
          <h1 class="pname"><?=$_SESSION['products'][5][0] ?></h1>
          <h2 class="food">Type: <?=$_SESSION['products'][5][1] ?></h2>
          <p class="price"><?=$_SESSION['products'][5][2] ?></p>
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
          <h1 class="pname"><?php echo $_SESSION['products'][4][0]; ?></h1>
          <h2 class="food">Type: <?=$_SESSION['products'][4][1] ?></h2>
          <p class="price"><?=$_SESSION['products'][4][2] ?></p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- Half-and-half milk: $2.90 -->
      <div class="column">
        <div class="card">
          <a class="nutrition" href="images/half&halfinfo.jpg">
            <img src=<?=$_SESSION['products'][6][3] ?> class="pimage" alt="Half and Half" width="80" height="80">
          </a>
          <h1 class="pname"><?=$_SESSION['products'][6][0] ?></h1>
          <h2 class="drink">Type: <?=$_SESSION['products'][6][1] ?></h2>
          <p class="price"><?=$_SESSION['products'][6][2] ?></p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- chocolatemilk: $3.50 -->
      <div class="column">
        <div class="card">
          <a class="nutrition" href="images/chocolatemilkinfo.jpg">
            <img src=<?=$_SESSION['products'][7][3] ?> class="pimage" alt="chocolatemilk" width="80" height="80">
          </a>
          <h1 class="pname"><?=$_SESSION['products'][7][0] ?></h1>
          <h2 class="drink">Type: <?=$_SESSION['products'][7][1] ?></h2>
          <p class="price"><?=$_SESSION['products'][7][2] ?></p>
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
            <img src=<?=$_SESSION['products'][8][3] ?> class="pimage" alt="apple juice" width="80" height="80">
          </a>
          <h1 class="pname"><?=$_SESSION['products'][8][0] ?></h1>
          <h2 class="drink">Type: <?=$_SESSION['products'][8][1] ?></h2>
          <p class="price"><?=$_SESSION['products'][8][2] ?></p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- Orange juice: $1.50 -->
      <div class="column">
        <div class="card">
          <a class="nutrition" href="images/orangejuiceinfo.jpg">
            <img src=<?=$_SESSION['products'][9][3] ?> class="pimage" alt="orange juice" width="80" height="80">
          </a>
          <h1 class="pname"><?=$_SESSION['products'][9][0] ?></h1>
          <h2 class="drink">Type: <?=$_SESSION['products'][9][1] ?></h2>
          <p class="price"><?=$_SESSION['products'][9][2] ?></p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- Pineapple juice: $1.50 -->
      <div class="column">
        <div class="card">
          <a class="nutrition" href="images/pineapplejuiceinfo.jpg">
            <img src=<?=$_SESSION['products'][10][3] ?> class="pimage" alt="pineapple juice" width="80" height="80">
          </a>
          <h1 class="pname"><?=$_SESSION['products'][10][0] ?></h1>
          <h2 class="drink">Type: <?=$_SESSION['products'][10][1] ?></h2>
          <p class="price"><?=$_SESSION['products'][10][2] ?></p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- chocolatemilk: $1.50 -->
      <div class="column">
        <div class="card">
          <a class="nutrition" href="images/grapejuiceinfo.jpg">
            <img src=<?=$_SESSION['products'][11][3] ?> class="pimage" alt="grape juice" width="80" height="80">
          </a>
          <h1 class="pname"><?=$_SESSION['products'][11][0] ?></h1>
          <h2 class="drink">Type: <?=$_SESSION['products'][11][1] ?></h2>
          <p class="price"><?=$_SESSION['products'][11][2] ?></p>
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
          <img src=<?=$_SESSION['products'][12][3] ?> class="pimage" alt="White bread" width="80" height="80">
          <h1 class="pname"><?=$_SESSION['products'][12][0] ?></h1>
          <h2 class="food">Type: <?=$_SESSION['products'][12][1] ?></h2>
          <p class="price"><?=$_SESSION['products'][12][2] ?></p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- Wheat bread: $2.50 -->
      <div class="column">
        <div class="card">
          <img src=<?=$_SESSION['products'][13][3] ?> class="pimage" alt="wheatbread" width="80" height="80">
          <h1 class="pname"><?=$_SESSION['products'][13][0] ?></h1>
          <h2 class="food">Type: <?=$_SESSION['products'][13][1] ?></h2>
          <p class="price"><?=$_SESSION['products'][13][2] ?></p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- Multi-grain bread: $2.90 -->
      <div class="column">
        <div class="card">
          <img src=<?=$_SESSION['products'][14][3] ?> class="pimage" alt="Multi-grain bread" width="80" height="80">
          <h1 class="pname"><?=$_SESSION['products'][14][0] ?></h1>
          <h2 class="food">Type: <?=$_SESSION['products'][14][1] ?></h2>
          <p class="price"><?=$_SESSION['products'][14][2] ?></p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- bananabread: $3 -->
      <div class="column">
        <div class="card">
          <img src=<?=$_SESSION['products'][15][3] ?> class="pimage" alt="bananabread" width="80" height="80">
          <h1 class="pname"><?=$_SESSION['products'][15][0] ?></h1>
          <h2 class="food">Type: <?=$_SESSION['products'][15][1] ?></h2>
          <p class="price"><?=$_SESSION['products'][15][2] ?></p>
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
            <img src=<?=$_SESSION['products'][16][3] ?> class="pimage" alt="Beer" width="80" height="80">
          </a>
          <h1 class="pname"><?=$_SESSION['products'][16][0] ?></h1>
          <h2 class="alcoholic-drink">Type: <?=$_SESSION['products'][16][1] ?></h2>
          <p class="price"><?=$_SESSION['products'][16][2] ?></p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- Vodka: $20.00 -->
      <div class="column">
        <div class="card">
          <a class="alcoholcontent" href="images/vodkainfo.jpg">
            <img src=<?=$_SESSION['products'][17][3] ?> class="pimage" alt="vodka" width="80" height="80">
          </a>
          <h1 class="pname"><?=$_SESSION['products'][17][0] ?></h1>
          <h2 class="alcoholic-drink">Type: <?=$_SESSION['products'][17][1] ?></h2>
          <p class="price"><?=$_SESSION['products'][17][2] ?></p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- Whiskey: $15.00-->
      <div class="column">
        <div class="card">
          <a class="alcoholcontent" href="images/whiskeyinfo.jpg">
            <img src=<?=$_SESSION['products'][18][3] ?> class="pimage" alt="whiskey" width="80" height="80">
          </a>
          <h1 class="pname"><?=$_SESSION['products'][18][0] ?></h1>
          <h2 class="alcoholic-drink">Type: <?=$_SESSION['products'][18][1] ?></h2>
          <p class="price"><?=$_SESSION['products'][18][2] ?></p>
          <button class="add-to-cart" type="button">Add to Cart</button>
        </div>
      </div>
      <!-- Rum: $18.00 -->
      <div class="column">
        <div class="card">
          <a class="alcoholcontent" href="images/ruminfo.jpg">
            <img src=<?=$_SESSION['products'][19][3] ?> class="pimage" alt="rum" width="80" height="80">
          </a>
          <h1 class="pname"><?=$_SESSION['products'][19][0] ?></h1>
          <h2 class="alcoholic-drink">Type: <?=$_SESSION['products'][19][1] ?></h2>
          <p class="price"><?=$_SESSION['products'][19][2] ?></p>
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
    <form action="checkout.php" method="GET" type="hidden">
    <div class="cart-items">

    </div>
    <div class="cart-total">
      <strong class="cart-total-title">Total</strong>
      <span class="cart-total-price">$0</span>
      <input type="hidden" name="total" id="totalcart">
    </div>
    <button class="btn-checkout" type="submit">Go to checkout</button>
  </form>
  </section>
  </div>
  
     <?php
     if(isset($_SESSION[$_SESSION['username']])){
foreach ($_SESSION[$_SESSION['username']] as $num){
//make datbase alll pull to show products
 // $num[0]=ucfirst($num[0]);
  echo "<script>addToCartClickedforsession('$num[0]','$num[2]','$num[3]');</script>";
}}


?>
</body>

</html>
