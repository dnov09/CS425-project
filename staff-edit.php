<?php
session_start();
require_once('connection.php');
$_SESSION['productview']=array();
//$remem=$_SESSION['cart_p'];
$sql="select * from product ";
// $sql="select * from customer where username='".$user."' limit 1";
 $result=mysqli_query($con,$sql);
 $my_array=array();
 if(mysqli_num_rows($result)>0){
    while($row = $result->fetch_assoc()) {
        array_push($my_array,array($row["p_name"],$row["p_type"],$row["price"],$row["p_image"],$row["size"]));

    }
    $_SESSION['productview']=$my_array;
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
    <title>Staff Login</title>
    <link href="css/account.css" rel="stylesheet" />


  </head>
  <body>

  <section class= "info">
      <h1><center>Product Information</center></h1>
      <div class="imgcontainer">
        <a href="home.php"><img src="images/D3_logo.png" alt="Logo" class="Logo" width="150" height="150"/></a>
      </div>

      
  <?php foreach ($_SESSION['productview'] as $num) : ?>
  <section class= "info">
      <h1><center>Edit <?=$num[0]?> </center></h1>
    <form class="form" action="editproduct.php" method="GET" enctype="multipart/form-data">
      <div class="imgcontainer">
        <a href="staff-home.php"><img src="images/D3_logo.png" alt="Logo" class="Logo" width="150" height="150"/></a>
      </div>

        <label for="address"><b>Product name </b></label>
        <?php
     echo "<input type='hidden'
     id='name'
     name='names'
     value=$num[0]
     >";

?>


        <label for="expiration"><b>Product Price </b></label>
        <?php
        echo "<input
          type='text'
          id='price'
          name='price'
          value=$num[2]
          required
        >";
        ?>
        <button type="submit" id="save_changes" name="change">Save changes</button>
      
        </form>
      </div>
</section>
<?php endforeach ?>
  </body>
</html>
