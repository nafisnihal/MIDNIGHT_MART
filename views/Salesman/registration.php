<?php
    require_once('dbConnection.php');
	require_once('userModel.php');
	session_start();
    $name="";
    $err_name="";
    $uname="";
    $err_uname="";
    $pass="";
    $err_pass="";
    $cpass="";
    $err_cpass="";
    $email="";
    $err_email="";
    $dobDay="";
    $dobMonth="";
    $dobYear="";
    $err_dob="";
    $gender="";
    $err_gender="";
    $has_err=false;
    if(isset($_POST["submit"])){

    
        //NAME VALIDATION
        if(empty($_POST["name"])){
            $err_name="Please Enter Name!";
            $has_err=true;
        }
        elseif(strpos($_POST["name"],"abcd")){
			$err_name="Name can not contain sequence of 'abcd'";
            $has_err=true;
        }
        else{
            $name=$_POST["name"];
        }
		//EMAIL VALIDATION
        if(empty($_POST["email"])){
            $err_email="Please Enter Email!";
            $has_err=true;
        }
        elseif(strpos($_POST["email"],"@") && strpos($_POST["email"],".")){
            if(strpos($_POST["email"],"@") < strpos($_POST["email"],".")){
                $email=$_POST["email"];
            }
            else{
                $err_email="'@' Must be before '.'";
                $has_err=true;
            }
        }
        else{
            $err_email="Email must contain '@' and '.'";
            $has_err=true;
        }
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

		//CONFIRM PASSWORD VALIDATION
		if(empty($_POST["cpass"])){
            $err_cpass="Please Enter Confirm Password!";
            $hasError=true;
        }
		elseif(strcmp($_POST["cpass"],$_POST["pass"])!=0){
            $err_cpass="Password and Confirm Password must be same.";
            $hasError=true;
        }
		else{
            $cpass=$_POST["cpass"];
        }
        
        //GENDER VALIDATION
        if(empty($_POST["gender"])){
			$err_gender="Gender Required.";
			$has_err=true;
        }
        else{
            $gender=$_POST["gender"];
        }

		//DOB VALIDATION
        if(empty($_POST["dob"])){
			$err_dob="Please Select Date of Birth!";
            $has_err=true;
        }
        else{
            $dob=$_POST["dob"];
        }
        if(!$has_err)
		{
			$_SESSION['name'] = $_POST['name'];
            $_SESSION['email'] = $_POST['email'];
			$_SESSION['uname'] = $_POST['uname'];
			$_SESSION['pass'] = $_POST['pass'];
			$_SESSION['gender'] = $_POST['gender'];
			$_SESSION['dob'] = $_POST['dob'];

            $_SESSION['flag'] = true;

            $userDetails = array('name' => $name, 'email' => $email, 'username' => $uname, 'password' => $pass, 'gender' => $gender, 'dob' => $dob);
			$connection = getConnection();
			$check = insertsalesMan($userDetails);
            
			if($check)
			{
				echo "Success!";
				//alert('Registration Successful');
				header('location: login.php');
			}
			else
			{
				echo "Error occured!";
			}
		}
        
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>
    MIDNIGHT MART
	</title>
</head>
<body background="6.png" link="#000" alink="#017bf5" vlink="#000">
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
					<a href="#home">HOME</a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="#">ABOUT US</a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="#">HISTORY</a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="#">BLOG</a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="#">CONTACT US</a>&nbsp;&nbsp;&nbsp;&nbsp;
				</font>
			</h3>
			<br /><br /><br /><br />
			
<body>

<html>
<head>
<title>REGISTRATION</title>
</head>
<body>
<table border="0" width="100%" cellspacing="0">
<form method = "post" action ="">

<td colspan="0" align="center">
<form method = "post" action ="" >
<fieldset style= width:40%>
<legend>REGISTRATION  FOR SALESMAN</legend> 

<table align="left">
<tr> 
<td>Name</td>
<td><input type="text" name="name"><?php echo $err_name ?></td>
</tr>

<tr> 
<td>Email</td>
<td><input type="email" name="email"><?php echo $err_email ?></td>
</tr>

<tr> 
<td>User Name</td>
<td><input type="text" name="uname"><?php echo $err_uname ?></td>
</tr>


<tr> 
<td>Password</td>
<td><input type="password" name="pass"><?php echo $err_pass ?></td>
</tr>

<tr> 
<td>Confirm Password</td>
<td><input type="password" name="cpass"><?php echo $err_cpass ?></td>
</tr>



<tr><td colspan="2">
<fieldset>
<legend>Gender</legend>
<input type="radio" id="male" name="gender" value="male">
  <label for="male">Male</label>
  <input type="radio" id="female" name="gender" value="female">
  <label for="female">Female</label>
  <input type="radio" id="other" name="gender" value="other">
  <label for="other">Other</label>
  <?php echo $err_gender ?>
  </td>
</tr>
</fieldset>


<tr><td colspan="2">
<fieldset>
<legend>Date of Birth</legend>
<label for="dob">Date of Birth: </label>
<input type="date" id="dob" name="dob"><?php echo $err_dob ?>
  </td>
</tr>
</fieldset>


<hr>

<td colspan="2"><input type="submit" name="submit" value="submit">&nbsp;&nbsp;&nbsp;
<input type="reset" name="reset" value="reset">&nbsp;&nbsp;&nbsp; <a href="login.php">Login</a></td>

</td>
</table>
</fieldset>

</form>
</body>
<div id="footer">
<?php include '../../php/footer.php';?>
</div>
</html>
