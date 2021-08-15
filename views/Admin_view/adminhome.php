<?php
require_once('../../php/session_header.php');
	require_once('../../service/userService.php');
	$userinfo = getByName($_SESSION['username']);

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/navbar_customerhome.css">
    <link rel="stylesheet" href="../../css/adminhome.css">
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
  <li><a href="#contact">Contact</a></li>

  <li>
    <a href="../../views/Admin_view/complain.php">Complains</a>
  </li>
  <li><a href="/MIDNIGHT_MART/home.php">Home</a></li>
</ul>

    <section class="grid-section">
      <div class="admin-grid">
        <div class="admin-img">
        <img src="../images/icon1.jpg" class="image">
          <div class="middle">
            <div class="text"><a href="adminprofile.php"> MY PPROFILE </a></div>
          </div>
        </div>      
      </div>

      <div class="admin-grid">
        <div class="admin-img">
          <img src="../images/icon2.jpg" class="image">
            <div class="middle">
              <div class="text"><a href="empinfo.php"> EMPLOYEE </a></div>
            </div>
        </div>       
      </div>

      <div class="admin-grid">
        <div class="admin-img">
          <img src="../images/icon4.jpg" class="image">
          <div class="middle">
            <div class="text"><a href="orders.php">ORDERS</a></div>
          </div>
        </div>
      </div>

      <div class="admin-grid">
        <div class="admin-img">
        <img src="../images/icon3.jpg" class="image">
          <div class="middle">
            <div class="text"><a href="Inventoryinfo.php">INVENTORY</a></div>
          </div>  
        </div>     
      </div>
    </section>

</body>
<div id="footer">
<?php include '../../php/footer.php';?>
</div>
</html> 


