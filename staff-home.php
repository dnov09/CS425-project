<?php
session_start();
require_once('connection.php');
$_SESSION['customer']=array();

$sql = "select username, address, balance  from  customer ;";
$result = mysqli_query($con, $sql);

?>
 
<title>Staff Home</title>
<link href="css/home.css" rel="stylesheet" />
<link rel="stylesheet" href="css/staff-home.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="cart.js" async></script>

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
<a href="index.html"><img src="images/D3_logo.png" alt="Logo" class="Logo" width="150" height="150" align="left" /><a>
</div>

<div class="user">Welcome , <?=$_SESSION['username'] ?> </div>
<div class="alerter"><?=$_SESSION['username'] ?></div>

<div class="account">
  <a href="staff-edit.php" alt="account" height="80">Edit Product</a>
</div>

<section class="customers">
<h2>Cutomers</h2>
<?php
echo "<br>";
echo "<table border='1'>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    foreach ($row as $value) { 
        echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
</section>



</body> 
</html>
