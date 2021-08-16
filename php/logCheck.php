<?php
	session_start();
	require_once('../php/session_header.php');
	require_once('../service/userService.php');

	if(isset($_POST['submit'])){

		$username = $_POST['username'];
		$password = $_POST['password'];

		if(empty($username) || empty($password)){
			header('location: ../views/login.php?error=null_value');
		}else{

			$user = [
				'username'=>$username,
				'password'=>$password,
			];
			
			$status = validate($user);
			$ass = getByName($username);
			$abc = $ass['user_type'];
			echo $abc;

			if($status){
				$_SESSION['username'] = $username;
				$_SESSION['user_id'] = $ass['id'];;
				if($abc =='Customer')
				{
				header('location: ../views/Customer_view/Customer_home.php');
				}
				if($abc =='Admin')
				{
				header('location: ../views/Admin_view/adminhome.php');
				}
				if($abc =='Salesman')
				{
				header('location: ../views/Salesman/homePage.php');
				}
				else{
					echo "user is not available";
				}
			}else{
				header('location: logCheck.php');
				//header('location: ../views/login.php?error=invalid_user');
			}
		}
	}



?>