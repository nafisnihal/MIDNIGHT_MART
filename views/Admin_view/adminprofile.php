<?php
	require_once('../../php/session_header.php');
	require_once('../../service/userService.php');
	$userinfo = getByName($_SESSION['username']);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="../../css/home.css">
	<link rel="stylesheet" href="../../css/profile.css">
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
		<li><a href="#about">About</a></li>
		<li><a href="#about">Blog</a></li>
		<li><a href="#contact">Contact</a></li>
		<li><a href="adminhome.php">Home</a></li>
	</ul>


	<div class="card">

		<img src="../../upload/imgmale.png" alt="John" style="width:95%">
		<h1><?=$userinfo['name']?></h1>
		<p class="title"><?=$userinfo['user_type']?>, MIDNIGHT MART</p>
		<div class="info"><i class="fas fa-envelope-open-text"></i>&nbsp;&nbsp;<?=$userinfo['email']?></div>
		<div class="info"><i class="fas fa-phone-alt"></i>&nbsp;&nbsp;<?=$userinfo['contact_number']?></div>
		<div class="info"><i class="fas fa-birthday-cake"></i>&nbsp;&nbsp;<?=$userinfo['dob']?></div>
		<div class="info"><i class="fas fa-venus-mars"></i>&nbsp;&nbsp;<?=$userinfo['gender']?></div>
		<div class="info"><i class="fas fa-map-marked"></i>&nbsp;&nbsp;<?=$userinfo['address']?></div>
		<div class="info"><i class="fas fa-user-edit"></i><a href="update_own.php">o</a>Update</div>
	</div>


</body>
<div id="footer">
<?php include '../../php/footer.php';?>
</div>
</html>