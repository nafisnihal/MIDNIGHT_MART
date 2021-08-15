<?php

	require_once('dbConnection.php');
	require_once('userModel.php');

	session_start();
	$uname="";
		$err_uname="";
		$pass="";
		$err_pass="";
		$has_err=false;
    if(isset($_POST["submit"])){
       
		
        //USER NAME VALIDATION
        if(empty($_POST["uname"])){
            $err_uname="Please Enter Username!";
            $has_err=true;
        }
        elseif((strlen($_POST["uname"])<6)){
            $err_uname="Username must be 6 characters long!";
            $has_err=true;
        }
        elseif(strpos($_POST["uname"]," ")){
            $err_uname="Username can not contain any space!";
            $has_err=true;
        }
        else{
            $uname=$_POST["uname"];
        }
        //PASSWORD VALIDATION
        if(empty($_POST["pass"])){
            $err_pass="Please Enter Password!";
            $hasError=true;
        }
        elseif(strlen($_POST["pass"])<8){
            $err_pass="Password must be 8 characters long.";
            $hasError=true;
        }
        elseif(!strpos($_POST['pass'], "1") && !strpos($_POST['pass'], "2") && !strpos($_POST['pass'], "3") && !strpos($_POST['pass'], "4")
            && !strpos($_POST['pass'], "5") && !strpos($_POST['pass'], "6") && !strpos($_POST['pass'], "7") && !strpos($_POST['pass'], "8")
            && !strpos($_POST['pass'], "9") && !strpos($_POST['pass'], "0")) {
            $err_pass="Password must have 1 numeric";
            $hasError=true;
        }
        elseif(strcmp(strtoupper($_POST["pass"]),$_POST["pass"])==0 && strcmp(strtolower($_POST["pass"]),$_POST["pass"])==0){
            $err_pass="Password must contain 1 Upper and Lowercase letter.";
            $hasError=true;
        }
        elseif(strpos($_POST["pass"],"#")==false && strpos($_POST["pass"],"?")==false){
            $err_pass="Password must contain '#' or '?'.";
            $hasError=true;
        }
        else{
            $pass=$_POST["pass"];
        }

        if(!$has_err)
		{
			$_SESSION['uname'] = $_POST['uname'];
			$_SESSION['pass'] = $_POST['pass'];

			//$_SESSION['flag'] = true;

			$userDetails = array('username' => $uname, 'password' => $pass);
			$connection = getConnection();

			$check = getloginInfo($uname,$pass);
			if($check)
			{
				$_SESSION['flag'] = true;
				echo "Success!";
				header('location: homePage.php');
				
				//header('location: ../view/dashBoard.php');
			}
			else
			{
				echo "Error occured!";
			}
			
			
		}
		else
		{
			echo "Error occured!";
		}

        
    }


?>






<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
<style>
	body{

margin : 0;
padding: 0;
font-family: sans-serif;
background: #34495e;
}
tr{
	color: white;
}
.box{
width: 350px;
padding: 40px;
position : absolute;
top : 50%;
left: 50%;
transform: translate(-50%,-50%);
background: #191919;
text-align: center;
}
.box h1 {
color: white;
text-transform: uppercase;
font-weight:500;
}
.box input[type="text"],.box input[type="password"]{
border: 0;
background: none;
display:block;
margin: 20px auto;
text-align: center;
border : 2px solid #3498db;
padding:14px 10px;
width: 200px;
outline: none;
color: white;
border-radius: 24px;
transition: 0.25s;
}
.box input[type="text"]:focus,.box input[type="password"]:focus {
width: 280px;
border-color: #2ecc71;
}
.box input [type="submit"]{
border: 0;
background: none;
display:block;
margin: 20px auto;
text-align: center;
border : 2px solid #2ecc71;
padding:14px 40px;
width:100px;
outline: none;
color: white;
border-radius: 24px;
transition: 0.25s;
cursor: pointer;
}
.box input [type="submit"]:hover {
background: #2ecc71;
}
</style>
</head>
<body>
<div class="main" id="home">
			<br />
			<h3 align="center">
				<font face="sans-serif" size="6" color="#2c3e50">MIDNIGHT MART</font>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<font face="sans" size="4">
					<a href="/MIDNIGHT_MART/home.php">HOME</a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="#">ABOUT US</a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="#">HISTORY</a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="#">BLOG</a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="#">CONTACT US</a>&nbsp;&nbsp;&nbsp;&nbsp;
				</font>
			</h3>
			<br /><br /><br /><br />
		</div>


	<center>
	<form class ="box" method="post" action=""> 
		
			<h1>Login</h1>
			
			<table border="0" width="100%" cellspacing="0">
			
				<tr>
					<td>User Name</td>
					<td><input type="text" name="uname"><?php echo $err_uname ?></td>
				
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="pass"><?php echo $err_pass ?></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="submit" value="Submit">
						<a href="registration.php">Sign up </a>
					</td>
				</tr>
				
			</table>
		</fieldset>
		
	</form>
	<center>
</body>
<div id="footer">
<?php include '../../php/footer.php';?>
</div>
</html>