
<!DOCTYPE html>
<html>

<head>
     <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background: lightblue;
     
    }


   
    .navbar {
        overflow: hidden;
        background-color: #333;
        height: 60px;
    }

    .navbar a {
        float: left;
        font-size: 18px;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    .dropdown {
        float: left;
        overflow: hidden;
    }

    .dropdown .dropbtn {
        font-size: 16px;
        border: none;
        outline: none;
        color: white;
        padding: 14px 16px;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
    }

    .navbar a:hover,
    .dropdown:hover .dropbtn {
        background-color: red;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        float: none;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .navbar a.right {
        float: right;
    }

    .title {
        text-align: center;
        font-size: 70px;
        margin-top: 100px;
    }
    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
	#footer{
  text-align:center;
}

    </style>
</head>

<body>

    <div class="navbar">

        <a href="#Home">HOME</a>
        <div class="dropdown">
            <button class="dropbtn">Profile
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="viewProfile.php">View Profile</a>
                <a href="editProfile.php">Edit Profile</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Product
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="addProduct.php">Add product</a>
                <a href="editProduct.php">Edit product</a>
                <a href="deleteProduct.php">Delete Product</a>
            </div>
        </div>
        <a class="right" href="../login.php">Logout</a>
    </div>
    <div class="container">

        <h1 class="title"> Wellcome to Seller Portal</h1>

        <div class="polaroid ">

            <p>
                <a>
                    <img src="asset/2.jpg"  class="center">
                </a>
            </p>

        </div>
       
    </div>
    

</body>
<div id="footer">
<?php include '../../php/footer.php';?>
</div>
</html>
