<?php 
	
	 $_db = array(
	
		"host" => "greenfireadmin.db.11637525.hostedresource.com",
		"username" => "greenfireadmin",
		"password" => "gr33nF!re",
		"name" => "greenfireadmin", 
	
	);
	
	 $connection = mysql_connect($_db['host'],$_db['username'],$_db['password']);
	 $databse = mysql_select_db($_db['name']);
		
	
?>