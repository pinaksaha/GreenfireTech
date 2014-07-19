<?php
	include("../../lib/lib.php");
	
	//get the project id
	$project_id = $_REQUEST['project_id'];
	
	//get the price
	$product_price = $_REQUEST['price'];
		
	//check if project already exists in pushed products
	$products = getProductByProjectID($project_id);
	
	//if any product was return, we know this project was pushed already
	if( sizeof($products) > 0 )
	{
		if( empty($product_price) )
		{
			print "wtf!";
			$product_price = 0;
		}
		
		//if product exists already, just update
		updateProduct($products[0]['id'],$product_price);
		
		//redirect to the products page
		header('Location: ../index.php?view=products');
	}
	else
	{
		//product doesn't exist, create it
		
		//check if price value is empty
		if( !empty($product_price) )
		{
			//if not empty then create product
			createProduct($project_id,$product_price);
		
			//redirect to the products page
			header('Location: ../index.php?view=products');
		}
		else
		{	
			//if no price is set, set price to $0
			$product_price = 0;
		
			//create new product
			createProduct($project_id,$product_price);
		
			//redirect to the products page
			header('Location: ../index.php?view=products');
		}
	}
?>