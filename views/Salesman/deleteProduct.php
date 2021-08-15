<?php

require_once('dbConnection.php');
    require_once('userModel.php');
	session_start();
	if(isset($_SESSION['flag']))
	{

    $connection = getConnection();
	$productList = getAllProduct();

    $_SESSION['flag'] = true;
    if(isset($_GET['productid']))
    {
    $productid = $_GET['productid'];
	$connection = getConnection();
    $check = deleteProduct($productid);
    if($check)
    {
        echo "Product deleted!";
        header('location: deleteProduct.php');
    }
    else
    {
        echo "Error occured!";
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
    <fieldset style="width: 40%">
		<legend>SEARCH</legend>
		<form method="POST" action="">
			<input type="text" name="productId" style="width: 50%">
			<input type="submit" name="search" value="Search By Product ID">
		</form>
        </br>
		<?php
			if(!isset($_POST['search']))
			{
				echo "<table border = 1 cellspacing = 0>
					<tr>
						<td>Product Name</td>
						<td>Product ID</td>
                        <td>Product Price</td>
                        <td>Product Amount</td>
                        <td>Product Added Date</td>
                        
						<td>Operations</td>
					</tr>";

				for($i = 0; $i < count($productList); $i++)
				{
					
					echo "<tr>
							 <td>{$productList[$i]['productname']}</td>

                             <td>{$productList[$i]['productid']}</td>

                             <td>{$productList[$i]
                            ['productprice']}</td>

                             <td>{$productList[$i]['productamount']}</td>

                             <td>{$productList[$i]['adddate']}</td>
							 
							 <td> <a href='deleteProduct.php?productid={$productList[$i]['productid']}'> Delete </a> </td>
						</tr>";
				}

				echo "</table>";
			}
			else
			{
				$productId = $_POST['productId'];
				$connection = getConnection();
				$searchProduct = searchByName($productId);

				if($searchProduct)
				{
					echo "<table border = 1 cellspacing = 0>
					<tr>
						<td>Product Name</td>
						<td>Product ID</td>
                        <td>Product Price</td>
                        <td>Product Amount</td>
                        <td>Product Added Date</td>
                        
						<td>Operations</td>
					</tr>";

					
					echo "<tr>
							 <td>{$searchProduct['productname']}</td>

                             <td>{$searchProduct['productid']}</td>

                             <td>{$searchProduct
                            ['productprice']}</td>

                             <td>{$searchProduct['productamount']}</td>

                             <td>{$searchProduct['adddate']}</td>
							 
							 <td> <a href='deleteProduct.php?productid={$searchProduct['productid']}'> Delete </a> </td>
						</tr>";
				}
				else
				{
					echo "Product is not in the list!";
				}
			}
		?>
	</fieldset>
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