<?php
session_start();
//$_SESSION['username']='';
$user=$_SESSION['username'];
$_SESSION['find']=array();
require_once('connection.php');
$query= $_GET['search'];
   
    //list($month, $day, $year) = preg_split('[,]', $address);
    //echo "Month: $month; Day: $day; Year: $year<br />\n";

    
    $sql="select * from product where p_name='".$query."' ";
     $result=mysqli_query($con,$sql);
     $my_array=array();
    if(mysqli_num_rows($result)>0){
    //   $_SESSION['username']=$user;
    //     sleep(1.5);
    //     header("Location: /dashboard/editcredit.php");
    //     exit();
    while($row = $result->fetch_assoc()) {
        array_push($my_array,array($row["p_name"],$row["p_type"],$row["price"],$row["p_image"]));
    }
    $_SESSION['find']=$my_array;
    }else{
        $sql="select * from product where p_type='".$query."' ";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
            //   $_SESSION['username']=$user;
            //     sleep(1.5);
            //     header("Location: /dashboard/editcredit.php");
            //     exit();
            while($row = $result->fetch_assoc()) {
                array_push($my_array,array($row["p_name"],$row["p_type"],$row["price"],$row["p_image"]));
            }
            $_SESSION['find']=$my_array;
            }else{
                $sql="select * from product where p_name like '%".$query."%' ";
          $result=mysqli_query($con,$sql);
             if(mysqli_num_rows($result)>0){
            //   $_SESSION['username']=$user;
            //     sleep(1.5);
            //     header("Location: /dashboard/editcredit.php");
            //     exit();
            while($row = $result->fetch_assoc()) {
                array_push($my_array,array($row["p_name"],$row["p_type"],$row["price"],$row["p_image"]));
            }
            $_SESSION['find']=$my_array;
            }else{
                echo 'No result found';
            }
            }
    }
?>
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
  <form class="example" action="action_page.php" method="GET" style="margin:auto;max-width:300px">
    <input type="text" placeholder="Search for products" name="search">
    <button type="submit" name="searcher"><i class="fa fa-search"></i></button>
  </form>
  <div class="user">Welcome , <?=$_SESSION['username'] ?> </div>
  <div class="alerter"><?=$_SESSION['username'] ?></div>

  <div class="account">
    <a href="account.php" alt="account" height="80">Credit-Card(+)</a>
  </div>
  <div class="cart">
    <a href="#cart"><input type="image" src="images/cart_icon.png" alt="Logo" width="80" height="80"></a>
  </div>



  <section class="products">
  <?php foreach ($_SESSION['find'] as $num) : ?>
    <div class="row">
    <?php
    echo "<div class='column'>
    <div class='card'>
    <a class='nutrition' href='images/bananainfo.jpg'>
    <img src=$num[3] class='pimage' alt=$num[0] width='80' height='80'></a>
    <h1 class='pname'>$num[0]</h1>
    <h2 class='food'>Type:$num[1] </h2>
    <p class='price'>$num[2]</p>
    <button class='add-to-cart' type='button'>Add to Cart</button>
    </div>
    </div>
    ";
 

     ?>
    <!-- <div class="column">
        <div class="card">
          <a class="nutrition" href="images/bananainfo.jpg">
            <img src= class="pimage" alt="Banana" width="80" height="80"></a>
          <h1 class="pname"></h1>
          <h2 class="food">Type: </h2>
          <p class="price"></p>
          <button class="add-to-cart" type="button">Add to Cart</button>
         
        </div>
       
      </div> -->
      <?php endforeach ?>
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