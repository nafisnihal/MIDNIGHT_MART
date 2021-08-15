<?php

	if (isset($_GET['error'])) {
		
		if($_GET['error'] == 'null_value'){
			echo "Username/Password field can't left empty...";
		}

		if($_GET['error'] == 'invalid_user'){
			echo "Invalid username or Password";
		}

		if($_GET['error'] == 'invalid_request'){
			echo "You have to login first...";
		}

	}else if(isset($_GET['success'])){
		
		if($_GET['success'] == 'registration_done'){
			echo "Registration Done! Now you can login...";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<script type="text/javascript" src="../Asset/JS/login.js"></script>
	<link rel="stylesheet" href="../css/home.css">
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
		<li><a href="/MIDNIGHT_MART/home.php">Home</a></li>
	</ul>
	</h2>

	<form action="../php/logCheck.php" method="post">
		<fieldset class="login">
			<legend id="signin_text">SignIn</legend>

			
			<table align='center'>
				<tr>
					<td>Username</td>
					<td><input type="text" id="username" name="username" onkeyup="userRemover()" onblur="userEmpty()"></td>
				</tr>
				<tr>
				<td></td>
				<td><i id="userMsg" style="color:red;font-size: 15px; white-space: pre;"></i></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" id="password" name="password" onkeyup="pRemover()" onblur="passwordEmpty()"></td>
				</tr>
				<tr>
				<td></td>
				<td><i id="passMsg" style="color:red;font-size: 15px; white-space: pre;"></i></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Submit"></td>
				</tr>
				<tr>
					<td></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td></td>
					<td>Don't have an account?</td>
				</tr>
				<tr>
					<td></td>
					<td id="signup_btn"><a href="register.php">Signup</a></td>
				</tr>
			</table>
		</fieldset>
	</form>
	</div> 
</body>
<div id="footer">
<?php include '../php/footer.php';?>
</div>
</html>