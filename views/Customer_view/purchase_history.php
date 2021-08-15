<?php
	require_once('../../php/session_header.php');
	require_once('../../service/userService.php');
	require_once('../../service/product_service.php');
	$username=$_SESSION['username'];	
	$userinfo = getByName($username);
	$my_id= $userinfo['id'];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width-device-width, initial-scale=1.0">
<link rel="stylesheet" href="../../css/navbar_customerhome.css">
<link rel="stylesheet" href="purchase_history.css">
	<title>Purchase History</title>
	<style>
	#footer{
  background-color: #f19494;
  text-align:center;
}
</style>
</head>
<div id="navbar">

<p id="logo"><b>MIDNIGHT MART</b></p> 
  
</div>
<ul>
  <li><a href="../../php/logout.php">Logout</a></li>
  <li><a href="#contact">Contact</a></li>

  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Profile</a>
    <div class="dropdown-content">
      <a href="../../views/Customer_view/customerprofile.php">My Profile</a>
      <a href="../../views/Customer_view/edit.php">Update My Profile</a>
    </div>
  </li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">History</a>
    <div class="dropdown-content">
      <a href="../../views/Customer_view/purchase_history.php">Purchase History</a>
      <a href="../../views/Customer_view/complain.php">Complains</a>
    </div>
  </li>
  <li><a href="Customer_home.php">Home</a></li>
</ul>
		
        <h3 align="center">Past Orders</h3>
<div class="wrapper">
<?php  
			$my_purchase = getPurchaseHistory($my_id);
			for ($i=0; $i != count($my_purchase); $i++) { 
				$product_id=$my_purchase[$i]['product_id'];
				$product_info=  getByProductID($product_id);
			?>
			
	<div class="purchase_form">
	<div class="img"><img src="../images/p_images/<?=$product_info['product_image']?>" height="450px" width="330px"></div>

	<div class="purchase_details">
	<h2>Order Purchased From <?=$my_purchase[$i]['order_from']?>

	<h3>Customer Name:</h3>
	<h4><?=$my_purchase[$i]['customer_name']?></h4>

	<h3>Purchased Date:</h3>
	<h4><?=$my_purchase[$i]['order_date']?></h4>

	<h3>Contact Number:</h3>
	<h4><?=$my_purchase[$i]['contact_number']?></h4>

	<h3>Order Receive Address:</h3>
	<h4><?=$my_purchase[$i]['address']?></h4>
	</div>
    </div>
	<?php }?>
</div>
</form>
</body>
<div id="footer">
<?php include '../../php/footer.php';?>
</div>
</html>