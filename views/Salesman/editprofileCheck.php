<?php
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
    if(isset($_POST["edit"])){

    
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
				header('location: userProfile.php');
			}
			else
			{
				echo "Error occured!";
			}
		}
        
    }

?>