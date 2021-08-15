<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="css/home.css">
	<meta charset="utf-8">
	<title>
	Midnight Mart
	</title>
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
		<li><a href="#about">About</a></li>
		<li><a href="#about">Blog</a></li>
		<li><a href="#contact">Contact</a></li>
		<li><a href="views/login.php">Login</a></li>
	</ul>

			<h1 align="center">
				<font face="sans-serif" color="#2980b9" size="7">
				WELCOME TO MIDNIGHT MART
				</font>
			</h1>
			<br><br><br>
			<h3 align="center">
				<font face="Lato" color="#000" size="5">
					Everything You Need at Midnight <br> We will deliver in short time
				</font>
			</h3>
			<br />
			<div class="start_shop" align="center">
				<p><b><a href="views/login.php"><font face="sans-serif" size="6" color="Black" >START SHOPPING</font></a></b></p>
			</div>
		</div>
		
		<br><br><br><br><br><br>
		<div class="photos" id="about">
			<hr color="#A9A9A9" width="20%">
				<p align="center"><font face="sans-serif" color="#2c3e50" size="5.5">Featured Products</font></p>
			<hr color="#A9A9A9" width="20%">
			<br><br>
			<table align="center" cellspacing="10" cellpadding="15">
				<tr>
					<td>
						<img src="views/images/img1.jpg" height="200" width="300">
					</td>
					<td>
						<img src="views/images/img2.jpg" height="200" width="300">
					</td>
					<td>
						<img src="views/images/img3.jpg" height="200" width="300">
					</td>
				</tr>
				<tr>
					<td>
						<img src="views/images/img4.jpg" height="200" width="300">
					</td>
					<td>
						<img src="views/images/img5.jpg" height="200" width="300">
					</td>
					<td>
						<img src="views/images/img6.jpg" height="200" width="300">
					</td>
				</tr>
			</table>
		</div>

		<!-- contact us -->

		<br><br><br><br><br><br><br><br><br><br>
		<div class="contact">
		<p align="center"><font face="sans-serif" color="#017bf5" size="5.5" id="contact">CONTACT US</font></p>

		<table align="center" cellspacing="10" cellpadding="15">
				<tr>
					<td>
						<a href="https://www.facebook.com" target="_blank">
							<img src="views/images/fb.jpg" height="50" width="50">
						</a>
					</td>
					<td>
						<a href="https://www.instagram.com" target="_blank">
							<img src="views/images/insta.jpg" height="50" width="50">
						</a>
					</td>
				</tr>
			</table>

		</div>
		<br><br><br><br><br>
		
</body>
<div id="footer">
<?php include 'php/footer.php';?>
</div>
</html>