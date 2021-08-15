<?php
	require_once('../../php/session_header.php');
	require_once('../../service/userService.php');
    $id=$_GET['id'];
	$userinfo = getByID($id);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="../../css/home.css">
    <link rel="stylesheet" href="../../css/update_own.css">
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

    <div class="grids">
        <div class="demo">
        </div>
        <div class="info">
            <form action="../../php/userController.php" method="post">
                <fieldset>
                    <legend>Edit User</legend>
                    <table align='center'>
                        <tr>
                        
                            <td>Name</td>
                            <td><input type="text" name="name" value="<?=$userinfo['name']?>"></td>
                        </tr>

                        <tr>
                            <td>Address</td>
                            <td><input type="text" name="address" value="<?=$userinfo['address']?>"></td>
                        </tr>

                        <tr>
                                <td>Contact Number</td>
                                <td><input type="text" name="contact_number" value="<?=$userinfo['contact_number']?>"></td>
                        </tr>

                        <tr>
                            <td>Gender</td>
                            <td><input type="text" name="gender" value="<?=$userinfo['gender']?>"></td>
                        </tr>
                        <tr>
                            <td>Date Of Birth</td>
                            <td><input type="date" name="dob" value="<?=$userinfo['dob']?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="hidden" name="id" value="<?=$userinfo['id']?>">
                                <input type="submit" name="edit_others" value="Update"> 
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </form>
        </div>
    </div>



</body>
<div id="footer">
<?php include '../../php/footer.php';?>
</div>
</html>