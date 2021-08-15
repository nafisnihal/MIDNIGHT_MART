<?php

function insertsalesMan($userDetails)
	{
		$conn = getConnection();
		$sql = "insert into salesman values('', '{$userDetails['name']}', '{$userDetails['email']}', '{$userDetails['username']}', '{$userDetails['password']}', '{$userDetails['gender']}','{$userDetails['dob']}')";
		
		if(mysqli_query($conn, $sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

function getloginInfo($uname,$pass)
	{

		$conn = getConnection();
		$sql = "select * from salesman where username='{$uname}' and password='{$pass}'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);

		return $row;
	}

function getinfobyId($username)
	{

		$conn = getConnection();
        
		$sql = "select * from salesman where username='{$username}'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);

		return $row;
	}


function updatesalesMan($userName, $userDetails)
	{

		$conn = getConnection();
		$sql = "update salesman set name='{$userDetails['name']}',email='{$userDetails['email']}',username='{$userDetails['username']}',password='{$userDetails['password']}',gender='{$userDetails['gender']}',dob='{$userDetails['dob']}' where username='{$userName}'";
		if(mysqli_query($conn, $sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

function insertProduct($productDetails)
	{
		$conn = getConnection();
		$sql = "insert into product values('', '{$productDetails['productname']}', '{$productDetails['productid']}', '{$productDetails['productprice']}', '{$productDetails['productamount']}', '{$productDetails['adddate']}')";
		
		if(mysqli_query($conn, $sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

function getAllProduct()
	{
		$conn = getConnection();
		$sql = "select * from product";
		$result = mysqli_query($conn, $sql);
		$users =[];

		while($row = mysqli_fetch_assoc($result))
		{
			array_push($users, $row); 
		}

		return $users;
	}

function searchByName($productId)
	{
		$conn = getConnection();
		$sql = "select * from product where productid='{$productId}'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);

		return $row;
	}

function getproductId($productidFound)
	{

		$conn = getConnection();
        
		$sql = "select * from product where productid='{$productidFound}'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);

		return $row;
	}

function updateProduct($productidFound, $productDetails)
	{

		$conn = getConnection();
		$sql = "update product set productname='{$productDetails['productname']}',productid='{$productDetails['productid']}',productprice='{$productDetails['productprice']}',productamount='{$productDetails['productamount']}',adddate='{$productDetails['adddate']}' where productid='{$productidFound}'";
		if(mysqli_query($conn, $sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

function deleteProduct($productid)
	{
		$conn = getConnection();
		$sql = "delete from product where productid='{$productid}'";
		
		if(mysqli_query($conn, $sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
?>