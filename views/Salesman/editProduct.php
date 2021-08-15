
<?php
    session_start();
    require_once('dbConnection.php');
	require_once('userModel.php');
	//session_start();
	if(isset($_SESSION['flag']))
	{

    if(isset($_GET['productid']))
	{
	$productidfound = $_GET['productid'];
	//$connection = getConnection();
	$editProduct = getproductId($productidfound);
	//$_SESSION['id'] = $id;
	//$gender=$editUser['gender'];
	//$status=$editUser['status'];
	}
	else
	{
		$productidfound="";
	}
    //session_start();
    $productName="";
    $err_name="";
    $productId="";
    $err_id="";
    $productPrice="";
    $err_price="";
    $productAmount="";
    $err_amount="";
    $addingDate="";
    $err_date="";
    $has_err=false;

    if(isset($_POST["edit"])){
        //NAME VALIDATION
        if(empty($_POST["productName"])){
            $err_name="Please Enter Product Name!";
            $has_err=true;
        }
        elseif(strpos($_POST["productName"],"abcd")){
			$err_name="Product Name can not contain sequence of 'abcd'";
            $has_err=true;
        }
        else{
            $productName=$_POST["productName"];
        }
		
        //ID VALIDATION
        if(empty($_POST["productId"])){
            $err_id="Please Enter Product ID!";
            $has_err=true;
        }
        elseif((strlen($_POST["productId"])<6)){
            $err_id="Product ID must be 6 characters long!";
            $has_err=true;
        }
        elseif(strpos($_POST["productId"]," ")){
            $err_id="Product ID can not contain any space!";
            $has_err=true;
        }
        else{
            $productId=$_POST["productId"];
        }
        
        //PRICE VALIDATION
        if(empty($_POST["productPrice"])){
			$err_price="Please Enter Product Price!";
            $has_err=true;
        }
        else{
            $productPrice=$_POST["productPrice"];
        }

        //Amount VALIDATION
        if(empty($_POST["productAmount"])){
			$err_amount="Please Enter Product Amount!";
            $has_err=true;
        }
        else{
            $productAmount=$_POST["productAmount"];
        }

		//DATE VALIDATION
        if(empty($_POST["addDate"])){
			$err_date="Please Select Date!";
            $has_err=true;
        }
        else{
            $addingDate=$_POST["addDate"];
        }
        if(!$has_err)
		{
            $_SESSION['flag'] = true;
            $productDetails = array('productname' => $productName, 'productid' => $productId, 'productprice' => $productPrice, 'productamount' => $productAmount, 'adddate' => $addingDate);
			$connection = getConnection();
			$check = updateProduct($productidfound,$productDetails);
			if($check)
			{
				echo "Success!";
				//$_SESSION['flag'] = true;
				header('location: homePage.php');
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

    <script type="text/javascript" src="script.js"></script>
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
        <table border="0" width="100%" cellspacing="30">
        <tr>
        <td width="33%">
			<center>
                
                <h1 id="myh1"></h1>
				<input type="text" name="name" id="name" onkeyup="ajax()" />
				<input type="submit" name="search" value="Search By Product ID">

				<div id="result">
              
				</div>

                </center>
			</td>

            

            
            
		</tr>

        </tr>
        <form method = "post" action ="">

        <td colspan="0" align="center">
        <form method = "post" action ="" >
        <fieldset style= width:40%>

        <?php
				if($productidfound)
				{
					
		?>
        <legend>Edit Product</legend> 

        <table align="left">
        <tr> 
        <td>Product Name</td>
        <td><input type="text" name="productName"value="<?php echo $editProduct['productname']?>"><?php echo $err_name ?></td>
        </tr>

        <tr> 
        <td>Product ID</td>
        <td><input type="text" name="productId"value="<?php echo $editProduct['productid']?>"><?php echo $err_id ?></td>
        </tr>

        <tr> 
        <td>Product Price</td>
        <td><input type="text" name="productPrice"value="<?php echo $editProduct['productprice']?>"><?php echo $err_price ?></td>
        </tr>

        <td>Product Amount</td>
        <td><input type="text" name="productAmount"value="<?php echo $editProduct['productamount']?>"><?php echo $err_amount ?></td>
        </tr>

        <tr><td colspan="2">

        Adding Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="date" name="addDate"value="<?php echo $editProduct['adddate']?>"><?php echo $err_date ?>
        </td>
        
        </tr>
        <td>
        </br>
        </td>
        <tr>

        </tr>

        <hr>

        <td colspan="2"><input type="submit" name="edit" value="edit">&nbsp;&nbsp;&nbsp;
        <input type="reset" name="reset" value="reset">&nbsp;&nbsp;&nbsp; </td>

        </td>

        </table>
        
        <?php
                }else{
                ?>
                    <legend>Edit Product</legend> 

                    <table align="left">
                    <tr> 
                    <td>Product Name</td>
                    <td><input type="text" name="productName"><?php echo $err_name ?></td>
                    </tr>
            
                    <tr> 
                    <td>Product ID</td>
                    <td><input type="text" name="productId"><?php echo $err_id ?></td>
                    </tr>
            
                    <tr> 
                    <td>Product Price</td>
                    <td><input type="text" name="productPrice"><?php echo $err_price ?></td>
                    </tr>
            
                    <td>Product Amount</td>
                    <td><input type="text" name="productAmount"><?php echo $err_amount ?></td>
                    </tr>
            
                    <tr><td colspan="2">
            
                    Adding Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="date" name="addDate"><?php echo $err_date ?>
                    </td>
                    
                    </tr>
                    <td>
                    </br>
                    </td>
                    <tr>
            
                    </tr>
            
                    <hr>
            
                    <td colspan="2"><input type="submit" name="edit" value="edit">&nbsp;&nbsp;&nbsp;
                    <input type="reset" name="reset" value="reset">&nbsp;&nbsp;&nbsp; </td>
            
                    </td>
            
                    </table>
        <?php
                }
        ?>

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