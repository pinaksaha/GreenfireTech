<?php 
	error_reporting(0);
	include('../config/db.php');
	
	function getUserByUsername($username)
	{
		$user = array();
		
		$q = "SELECT * FROM USERS WHERE username = '$username'";
		$q = mysql_query($q);
		
		//print mysql_error();
		
		while ($row = mysql_fetch_assoc ($q))
	    {
	    	array_push($user, $row);
	    }
		
		return $user;
	}
//----------------------------------------------------------------------
	function getUserByID($id)
	{
		$user = array();
		
		$q = "SELECT * FROM USERS WHERE id = '$id'";
		$q = mysql_query($q);
		
		//print mysql_error();
		
		while ($row = mysql_fetch_assoc ($q))
	    {
	    	array_push($user, $row);
	    }
		
		return $user;
	}
//----------------------------------------------------------------------	
	function createUser($username,$password)
	{
		$q = "INSERT INTO USERS (id,username,password,created_at,updated_at) VALUES(NULL,'$username','$password',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";
		mysql_query($q);	
		print mysql_error();
	}
	
//----------------------------------------------------------------------	
	function createProfile($profileObj)
	{
		//print_r($profileObj);
		
		//print "Creating Profile\n";
		$user_id = $profileObj['user_id'];
		$first_name = $profileObj['first_name'];
		$last_name = $profileObj['last_name'];
		$dir = $profileObj['pic_dir'];
		$position = $profileObj['position'];
		$email = $profileObj['email'];
		
		$q = "INSERT INTO `PROFILES` (`id`, `user_id`, `first_name`, `last_name`, `position`, `pic_dir`, `email`, `created_at`, `updated_at`) VALUES (NULL,$user_id, '$first_name', '$last_name', '$position', '$dir', '$email', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
		//	print "\n\n".$q."\n\n";
		mysql_query($q);	
		print mysql_error();		
	}
//----------------------------------------------------------------------

	function getAllUsers()
	{
		$users = array();
		
		$q = "SELECT * FROM `USERS`";
		$q = mysql_query($q);
		
		print mysql_error();
		
		while ($row = mysql_fetch_assoc ($q))
	    {
	    	array_push($users, $row);
	    }
		
		return $users;
	}	
	
//----------------------------------------------------------------------	
	
	function updateProfile($profileObj)
	{
		$profile_id = $profileObj['id'];
		$first_name = $profileObj['first_name'];
		$last_name = $profileObj['last_name'];
		$position = $profileObj['position'];
		$email = $profileObj['email'];
		$pic_dir = $profileObj['dir'];
		
		$q = "UPDATE `PROFILES` SET first_name = '$first_name', last_name = '$last_name', position = '$position', pic_dir = '$pic_dir', email = '$email', updated_at =CURRENT_TIMESTAMP  WHERE id = $profile_id";
		
		mysql_query($q);	
		print mysql_error();
		
	}
//----------------------------------------------------------------------	
	
	function updateUserPassowrd($id,$password)
	{
		$q = "UPDATE `USERS` SET password = '$password', updated_at = CURRENT_TIMESTAMP  where id = $id";
		mysql_query($q);	
		print mysql_error();
	}
		
//----------------------------------------------------------------------		
	function getProfileByUserID($id)
	{
		$profiles = array();
		$q = "SELECT * FROM PROFILES WHERE user_id = $id";
		$q = mysql_query($q);
		
		//print "\n\n".$q ."\n\n";	
		print mysql_error();
		
		while ($row = mysql_fetch_assoc ($q))
	    {
	    	array_push($profiles, $row);
	    }
		
		return $profiles;
		
	}
//----------------------------------------------------------------------	
	function createAboutMe($aboutObj)
	{
		//$aboutObj about Object
		//print_r($aboutObj);
		//print "Creating About\n";
		$profile_id = $aboutObj['profile_id'];
		$aboutme= $aboutObj['about_me'];
		$q = "INSERT INTO `greenfireadmin`.`ABOUT_USER` (`id`, `profile_id`, `about`, `created_at`, `updated_at`) VALUES (NULL, $profile_id, '$aboutme', CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";
		mysql_query($q);
		print mysql_error();
		
	}
//----------------------------------------------------------------------	
	function updateAboutMeByID($id,$about)
	{
		//$aboutObj about Object
		$q = "UPDATE 'ABOUT_USER' about = '$about' updated_at = CURRENT_TIMESTAMP where id = $id";
		mysql_query($q);
		print mysql_error();
	}
//----------------------------------------------------------------------		
	function updateAboutMeByProfileID($profile_id,$about)
	{
		//$aboutObj about Object
		$q = "UPDATE `ABOUT_USER` SET about = '$about',updated_at = CURRENT_TIMESTAMP where id = $profile_id";
		//$q = mysql_real_escape_string($q);
		//print "\n\n".$q."\n\n";
		mysql_query($q);
		print mysql_error();
	}
//----------------------------------------------------------------------	
	function getAboutMeByProfileID($id)
	{
		$aboutme = array();
		$q = "SELECT * FROM ABOUT_USER WHERE profile_id = $id";
		$q = mysql_query($q);
		
		print mysql_error();
		
		while ($row = mysql_fetch_assoc ($q))
	    {
	    	array_push($aboutme, $row);
	    }
		
		return $aboutme;	
	}
	
//----------------------------------------------------------------------	

	function getActiveProjects()
	{
		$projects = array();
		$q = "SELECT * FROM `PROJECTS` GROUP BY created_at ORDER BY `PROJECTS`.`created_at` DESC limit 5";
		$q = mysql_query($q);
		
		print mysql_error();
		
		while ($row = mysql_fetch_assoc ($q))
	    {
	    	array_push($projects, $row);
	    }
			 
		return $projects;
	}

//----------------------------------------------------------------------
	
	function getProjectByProjectID($id)
	{
		$projects = array();
		$q = "SELECT * FROM `PROJECTS` WHERE id = $id";
		//print "\n\n".$q."\n\n";
		//$q = mysql_real_escape_string($q);
		$q = mysql_query($q);
		
		print mysql_error();
		
		while ($row = mysql_fetch_assoc ($q))
	    {
	    	array_push($projects, $row);
	    }
	    
	    return $projects;
		
	}
		
//----------------------------------------------------------------------

	function getAllProjects()
	{
		$projects = array();
		$q = "SELECT * FROM `PROJECTS`";
		$q = mysql_query($q);
		
		print mysql_error();
		
		while ($row = mysql_fetch_assoc ($q))
	    {
	    	array_push($projects, $row);
	    }
		
		return $projects;
	}	
	
//----------------------------------------------------------------------	

	function createProject($name,$discription,$pic_dir)
	{
		$q = "INSERT INTO `PROJECTS`  (id,name,discriptions,pic_dir,created_at,updated_at) VALUES(NULL,'$name','$discription','$pic_dir',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";
		//print $name . "  => ". $discription;
		//print $q;
		mysql_query($q);	
		print mysql_error();
	}
	
//----------------------------------------------------------------------	

	function deleteProject($project_id)
	{
		//delete all attributes of projects of that row
		$q = "DELETE FROM `PROJECTS` WHERE id = $project_id";
		mysql_query($q);
		print mysql_error();
	}
	
//----------------------------------------------------------------------

	function updateProject($projectObj)
	{
		$project_id = $projectObj['id'];
		//print_r( $projectObj);
		$project_name = $projectObj['project_name'];
		$project_description = $projectObj['project_description'];
		//$project_pic = $projectObj['pic_dir'];
		
		$q = "UPDATE `PROJECTS` SET name = '$project_name', discriptions = '$project_description', updated_at = CURRENT_TIMESTAMP WHERE id = $project_id";
		
		mysql_query($q);	
		print mysql_error();	
	}	
	
//----------------------------------------------------------------------

	function assignUserToProject($project_id,$user_id)
	{
		$q = "INSERT INTO `PROJECTS_USERS` (id,project_id,user_id,created_at,updated_at) VALUES(NULL,$project_id,$user_id,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";
		
		//print "\n\n".$q."\n\n";		
		
		mysql_query($q);	
		print mysql_error();
	}
	
//----------------------------------------------------------------------
	function getAllProjectUsers($project_id) //jkl
	{	
		$project_users = array();
		
		$q = "SELECT * FROM `PROJECTS_USERS` WHERE project_id = $project_id";
		mysql_query($q);
		print mysql_error();
		
		while ($row = mysql_fetch_assoc ($q))
	    {
	    	array_push($project_users, $row);
	    }
		
		return $project_users;
	}
	
//----------------------------------------------------------------------
	function getProjectUsersByProjectID($project_id) //jkl
	{
		//returns an array with all users assigned to that project and their profiles
		
		$project_users = array();
		$profiles = array();
		$q = "SELECT * FROM `PROJECTS_USERS` WHERE project_id = $project_id";
		$q = mysql_query($q);
		print mysql_error();
		
		while($row = mysql_fetch_assoc($q))
		{
			array($project_users, $row);
		}
		for($i=0;$i < sizeof($project_users);$i++)
		{
			$temp = getProfileByUserID($project_users[$i]['user_id']);
			array_push($profiles,$temp[0]);
		}
		return $profiles;
	}
//----------------------------------------------------------------------	
	function getAllUsersFromAllProjects() //jkl
	{
		//returns everyone inside project users
		$project_users = array();
		
		$q = "SELECT * FROM  `PROJECTS_USERS` ";
		$q = mysql_query($q);
		
		print mysql_error();
		
		while ($row = mysql_fetch_assoc ($q))
	    {
	    	array_push($project_users, $row);
	    }
		
		return $project_users;
	}

//----------------------------------------------------------------------	

	function createCampaign($project_id, $campaign_name, $campaign_source, $campaign_url, $status) //jkl
	{
		$q = "INSERT INTO `CAMPAIGNS` (id,project_id,name,url,source,status,created_at,updated_at) VALUES(NULL,$project_id,'$campaign_name','$campaign_url','$campaign_source','$status',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";
		
		//sanitize
		//$q = mysql_real_escape_string($q);
		mysql_query($q);
		print mysql_error();
	}		
	
//----------------------------------------------------------------------	

function getActiveCampaigns() //jkl
	{
		$campaigns = array();
		$q = "SELECT * FROM `CAMPAIGNS` GROUP BY created_at ORDER BY `CAMPAIGNS`.`created_at` DESC";
		
		$q = mysql_query($q);
		
		print mysql_error();
		
		while ($row = mysql_fetch_assoc ($q))
	    {
	    	array_push($campaigns, $row);
	    }
			 
		return $campaigns;
	}
	
//----------------------------------------------------------------------

	function deleteCampaign($campaign_id) //jkl
	{
		//delete all attributes of projects of that row
		$q = "DELETE FROM `CAMPAIGNS` WHERE id = $campaign_id";
		mysql_query($q);
		print mysql_error();
	}
	
//----------------------------------------------------------------------

	function getCampaignByID($id) //jkl
	{
		$campaigns = array();
		$q = "SELECT * FROM `CAMPAIGNS` WHERE id = $id";
		$q = mysql_query($q);
		
		print mysql_error();
		
		while ($row = mysql_fetch_assoc ($q))
	    {
	    	array_push($campaigns, $row);
	    }
	    
	    return $campaigns;
		
	}
	
//----------------------------------------------------------------------

	function updateCampaign($campaignObj) //jkl
	{
		$campaign_id = $campaignObj['id'];
		//print_r( $campaignObj);
		$campaign_name = $campaignObj['name'];
		$campaign_url = $campaignObj['url'];
		$campaign_status = $campaignObj['status'];
		
		$q = "UPDATE `CAMPAIGNS` SET name = '$campaign_name', url = '$campaign_url', status = '$campaign_status', updated_at = CURRENT_TIMESTAMP WHERE id = $campaign_id";
		
		//sanitize
		//$q = mysql_real_escape_string($q);
		mysql_query($q);	
		print mysql_error();	
	}	
		
//----------------------------------------------------------------------

	function getAllProfiles()
	{
		$profiles = array();
		
		$q = "SELECT * FROM  `PROFILES` NATURAL JOIN  `ABOUT_USER` ";
		$q = mysql_query($q);
		
		print mysql_error();
		
		while ($row = mysql_fetch_assoc ($q))
	    {
	    	array_push($profiles, $row);
	    }
		
		return $profiles;
		
	}
	
//----------------------------------------------------------------------

	function getAllProducts() //jkl
	{
		$products = array();
		
		$q = "SELECT * FROM `PRODUCTS`";
		
		$q = mysql_query($q);
		print mysql_error();
		
		while ($row = mysql_fetch_assoc ($q))
	    {
	    	array_push($products, $row);
	    }
		
		return $products;
	}
	
//----------------------------------------------------------------------

	function createProduct($project_id,$price) //jkl
	{
		$q = "INSERT INTO `PRODUCTS` (id,project_id,price,created_at,updated_at) VALUES(NULL,$project_id,$price,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";
		$q = mysql_query($q);
		print mysql_error();
	}
	
//----------------------------------------------------------------------

	function updateProduct($product_id,$price) //jkl
	{
		$q = "UPDATE `PRODUCTS` SET price = '$price', updated_at = CURRENT_TIMESTAMP WHERE id = $product_id";
		$q = mysql_query($q);
		print mysql_error();
	}
	
//----------------------------------------------------------------------

	function getProductByProjectID($project_id) //jkl
	{
		$products = array();
	
		$q = "SELECT * FROM `PRODUCTS` WHERE project_id = '$project_id'";
		$q = mysql_query($q);
		print mysql_error();
		
		while ($row = mysql_fetch_assoc ($q))
	    {
	    	array_push($products, $row);
	    }
		
		return $products;
	}
//----------------------------------------------------------------------
?>