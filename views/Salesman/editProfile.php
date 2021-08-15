<?php
    require_once('dbConnection.php');
	require_once('userModel.php');
	session_start();

	//session_start();
	if(isset($_SESSION['flag']))
	{
        $username = $_SESSION['uname'];
        $connection = getConnection();
        $logedinUser = getinfobyId($username);
        //$gender=$logedinUser['gender'];


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
        if(isset($_POST["edit"]))
        {

    
        
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
    
                $userName=$_SESSION['uname'];
    
                $_SESSION['flag'] = true;
    
                $userDetails = array('name' => $name, 'email' => $email, 'username' => $uname, 'password' => $pass, 'gender' => $gender, 'dob' => $dob);
                $connection = getConnection();
                $check = updatesalesMan($userName, $userDetails);
                
                if($check)
                {
                    echo "Success!";
                    //alert('Registration Successful');
                    header('location: viewProfile.php');
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

    <style>
.scroll{
    width: 100%;
  height: 100%;
  overflow: auto;
} 

.space{
    display: flex;
    justify-content: space-between;
    
}
.flex-container {
  display: flex;
  
  flex-wrap:  wrap ;
  
}

.dropdown summary {
  list-style: none;
  cursor: pointer;
}   
    </style>
</head>
<body background="6.png" link="#000" alink="#017bf5" vlink="#000">
		<div>
			<br />
			<h3 align="left">
				<font face="sans-serif" size="6" color="#2c3e50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MIDNIGHT MART</font>
			</h3>

		</div>
    <div class="space">
        <div class="flex-container" >

                <details class="dropdown">
                    <summary>
                    <a href="homePage.php">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                    </summary>
                   
                </details>

                <details class="dropdown">
                    <summary>
                    Profile&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </summary>
                    <a href="viewProfile.php">View Profile</a><br>
                    <a href="editProfile.php">Edit Profile</a><br>
                </details>

                <details class="dropdown">
                    <summary>
                    Product&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </summary>
                    <a href="addProduct.php">Add Product</a><br>
                    <a href="editProduct.php">Edit product</a><br>
                    <a href="deleteProduct.php">Delete Product</a><br>
                </details>


        </div>

        <div>
                <details class="dropdown">
                    <summary>
                    <a href="login.php">Log out</a><br>
                    </summary>
                    
                </details>
        </div>

    </div>
    <div>
<center>
<form method = "post" action ="" >
<fieldset style= width:40%>
<legend>Edit Profile</legend> 

<table align="left">
<tr> 
<td>Name</td>
<td><input type="text" name="name" value="<?php echo $logedinUser['name']?> "><?php echo $err_name ?></td>
</tr>

<tr> 
<td>Email</td>
<td><input type="email" name="email" value="<?php echo $logedinUser['email']?> "><?php echo $err_email ?></td>
</tr>

<tr> 
<td>User Name</td>
<td><input type="text" name="uname" value="<?php echo $logedinUser['username']?> "><?php echo $err_uname ?></td>
</tr>


<tr> 
<td>Password</td>
<td><input type="password" name="pass" value="<?php echo $logedinUser['password']?> "><?php echo $err_pass ?></td>
</tr>

<tr> 
<td>Confirm Password</td>
<td><input type="password" name="cpass" value="<?php echo $logedinUser['password']?> "><?php echo $err_cpass ?></td>
</tr>



<tr><td>
Gender
</td>
<td>
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male")  echo "checked";?>value="male">Male

<input type="radio"  name="gender"<?php if (isset($gender) && $gender=="female")  echo "checked";?> value="female">Female

<input type="radio"  name="gender"<?php if (isset($gender) && $gender=="other")  echo "checked";?> value="other">Other
<?php echo $err_gender ?> 
 
  </td>
</tr>
</fieldset>


<tr><td>
Date of Birth
</td>
<td>
<input type="date" id="dob" name="dob" value="<?php echo $logedinUser['dob']?>"><?php echo $err_dob ?>
  </td>
</tr>
</fieldset>


<hr>

<td colspan="2"><input type="submit" name="edit" value="edit">&nbsp;&nbsp;&nbsp;
<input type="reset" name="reset" value="reset">&nbsp;&nbsp;&nbsp;</td>

</td>
</table>
</fieldset>
</form>
</center>

    </div>
			
</body>
<div id="footer">
<?php include '../../php/footer.php';?>
</div>
</html>

<?php

	}
    else
    {
		echo "Please do Registration before login in";
		header('location: registration.php');
	}

?>