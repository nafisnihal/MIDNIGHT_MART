<?php
  	require_once('dbConnection.php');
    require_once('userModel.php');

	session_start();
	if(isset($_SESSION['flag']))
	{
    //$_SESSION['flag'] = true;
    $username = $_SESSION['uname'];
    $connection = getConnection();
    $logedinUser = getinfobyId($username);
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
    <table border="0" width="100%" cellspacing="0">
<form method = "post" action ="">

<td colspan="0" align="center">
<form method = "post" action ="" >
<fieldset style= width:40%>
<legend>User Profile</legend> 

<table align="left">
<tr> 
<td>Name</td>
<td>
<?php echo $logedinUser['name']?> 
</td>
</tr>

<tr> 
<td>Email</td>
<td>
<?php echo $logedinUser['email']?> 
</td>
</tr>

<tr> 
<td>User Name</td>
<td>
<?php echo $logedinUser['username']?> 
</td>
</tr>

<tr> 
<td>Password</td>
<td>
<?php echo $logedinUser['password']?> 
</td>
</tr>

<tr>
<td>Gender</td>
<td>
<?php echo $logedinUser['gender']?> 
</td>

</tr>


<tr>
<td>Date Of Birth</td>
<td>
<?php echo $logedinUser['dob']?> 
</td>
</tr>



<hr>


</table>
</fieldset>

</form>

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