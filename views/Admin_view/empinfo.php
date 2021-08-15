<?php
	require_once('../../php/session_header.php');
	require_once('../../service/userService.php');
    $userinfo = getByName($_SESSION['username']);
	
?>

<!Doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width-device-width, initial-scale=1.0">
<link rel="stylesheet" href="../../css/empinfo.css">
<link rel="stylesheet" href="../../css/navbar_customerhome.css">
<link rel="stylesheet" href="../../css/complain.css">
<title> Employee Info </title>
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
    <ul>
	<li><a href="../../php/logout.php">Logout</a></li>
	<li><a href="#contact">Contact</a></li>
	<li><a href="adminhome.php">Home</a></li>
	</ul>

    <div class="empcards" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data" >
        <div class=emp>
            
        <?php
        $id=18;
        $userinfo = getByID($id);?>
            <div class="dp">
            <img src="../../upload/imgmale.png">
            </div>
            <div class="info">
                Name :<?=$userinfo['name']?><br>
                Email :<?=$userinfo['email']?><br>
                Phone :<?=$userinfo['contact_number']?><br>
                Gender :<?=$userinfo['gender']?><br>
                Date of Birth :<?=$userinfo['dob']?><br>
                Adress :<?=$userinfo['address']?><br>
                User Type :<?=$userinfo['user_type']?><br>
            </div>
            <div  class="update">
                <name=$id>
            <a href="update_emp_info.php?id=18">Update This User</a>
            </div>
        </div>

        <div class=emp>
        <?php
        $id=20;
        $userinfo = getByID($id);?>
            <div class="dp">
            <img src="../../upload/imgmale.png">
            </div>
            <div class="info">
                Name :<?=$userinfo['name']?><br>
                Email :<?=$userinfo['email']?><br>
                Phone :<?=$userinfo['contact_number']?><br>
                Gender :<?=$userinfo['gender']?><br>
                Date of Birth :<?=$userinfo['dob']?><br>
                Adress :<?=$userinfo['address']?><br>
                User Type :<?=$userinfo['user_type']?><br>
            </div>
            <div  class="update">
            <a href="update_emp_info.php?id=20">Update This User</a>
            </div>
        </div>

        

        

        <div class=emp>
            
        <?php $userinfo = getByID( $id= 21 );?>
            <div class="dp">
            <img src="../../upload/imgmale.png">
            </div>
            <div class="info">
                Name :<?=$userinfo['name']?><br>
                Email :<?=$userinfo['email']?><br>
                Phone :<?=$userinfo['contact_number']?><br>
                Gender :<?=$userinfo['gender']?><br>
                Date of Birth :<?=$userinfo['dob']?><br>
                Adress :<?=$userinfo['address']?><br>
                User Type :<?=$userinfo['user_type']?><br>
            </div>
            <div  class="update">
            <a href="update_emp_info.php?id=21">Update This User</a>
            </div>
        </div>

        

    </div>

</body>
<div id="footer">
<?php include '../../php/footer.php';?>
</div>
<html>