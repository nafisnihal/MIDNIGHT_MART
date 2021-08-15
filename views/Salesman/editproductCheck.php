<?php
	//sleep(3);
	session_start();
	$name = $_REQUEST['name'];

	$con = mysqli_connect('localhost', 'root', '', 'shopmanagement');
	$sql = "select * from product where productid like '%{$name}%'";
	$result = mysqli_query($con, $sql);

	$response = "<table border=1>
					<tr>
						
						<td>ProdyctName</td>
						<td>Product ID</td>
						<td>Product Price</td>
						<td>Product Amount</td>
						<td>Added Date</td>
                        <td>Operation</td>
						
					</tr>";

	while ($row = mysqli_fetch_assoc($result)) {
		$response .= 	"<tr>
							
							<td>{$row['productname']}</td>
							<td>{$row['productid']}</td>
							<td>{$row['productprice']}</td>
							<td>{$row['productamount']}</td>
					        <td>{$row['adddate']}</td>
							<td> <a href='editProduct.php?productid={$row['productid']}'> Edit</a></td>
						</tr>";
	} 

	$response .= "</table>";

	echo $response;

?>