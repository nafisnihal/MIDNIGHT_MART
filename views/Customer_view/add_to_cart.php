<?php
	require_once('../../php/session_header.php');
	require_once('../../service/product_service.php');

     $product_id =$_GET['id'];
     $product_details= getByProductID($product_id);
?>


<html>
<head>
    <title> Product Details</title>
    <link rel="stylesheet" href="../../css/home.css">
    <link href="add_to_cart.css" rel="stylesheet">
    <style>
	#footer{
  background-color: #f19494;
  text-align:center;
}
</style>
</head>
<body>
    <div id="navbar">

    <p id="logo"><b>MIDNIGHT MART</b></p> 

    </div>

    <ul>
      
      <li><a href="../../php/logout.php">LogOut</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#about">Blog</a></li>
      <li><a href="#contact">Contact</a></li>
      <li><a href="Customer_home.php">Home</a></li>

    </ul>

      <div class="wrapper">
          <div class="img">
          <img id="img" src="../images/p_images/<?=$product_details['product_image']?>" height="100%" width="100%">
          </div>

            <div class="product_name">

              <div class="product_details">
                <h1><b>Product Name:</b></h1>
                <h2><p><?=$product_details['product_name']?></p></h2>
                <p><b>Price:</b>$<?=$product_details['product_price']?></p>
                <a href="order_place.php?p_id=<?=$product_id?>##">
                <input type="button" value="Buy Now"></a>
              </div>

              <div class="product_details">
                <h3><b>Product Details:</b></h3>
                <p><?=$product_details['product_details']?></p>
              </div>

            </div>

          </div>

    </body>
    <div id="footer">
<?php include '../../php/footer.php';?>
</div>
    </html>