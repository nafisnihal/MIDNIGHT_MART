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
<link rel="stylesheet" href="../../css/complain.css">
	<title>Complain</title>
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
	<li><a href="../../php/logout.php">Logout</a></li>
	<li><a href="#contact">Contact</a></li>
	<li><a href="adminhome.php">Home</a></li>
	</ul>

	<form action="../../php/userController.php" method="post">
	<h2 align="center">Customer Complains</h2>
	<div class="wrapper">
          <div class="complain_form">
			<table >
			</table>
		</div>

		
	<div class="product_details">
	    <div class="row">
	          <div class="view_complain">Complain Type
              </div>
              <div class="view_complain">Complain Description
              </div>
              <div class="view_complain">Delete
              </div>
		</div>
		<?php  
			$complain = getAllComplain($my_id);
			for ($i=0; $i != count($complain); $i++) {  ?>
		    <div class="database_row">
	          <div class="view_complain"><?=$complain[$i]['complain_type']?>
              </div>
              <div class="view_complain"><?=$complain[$i]['description']?>
              </div>
              <div class="view_complain"><a href="../../php/complainCheck.php?id=<?=$complain[$i]['id']?>"><input type="button" value="Delete"  onclick="alert('Are you want to delete<?=$$complain[$i]['id'];?>')"></a>
              </div>
		    </div>
		<?php }?>
	</div>
</div>
	</form>
</body>
<div id="footer">
<?php include '../../php/footer.php';?>
</div>
</html>