<?php 
	include("../../lib/lib.php");
	include_once("../../lib/fileUpload.php");
	
	session_start();
	
	//get the user name from user
	$users_id = $_SESSION['Userid'];
	$users = getUserByID($users_id);
	
	//directory to save the new uploaded image
	$saveTo = "../../profile_pic/";
	
	if(!empty($_FILES))
	{	
		//store new image
		$dir = storeImg( $_FILES, $users[0][username],$saveTo);
	}
	else
	{
		//resort to original picture if nothing new
		$dir = "../img/profile-default.jpg";
	}
	
	$profileObj = array(
		'id' 			=> $_REQUEST['profile_id'],
		'first_name' 	=> $_REQUEST['first_name'],
		'last_name' 	=> $_REQUEST['last_name'],
		'position'		=> $_REQUEST['position'],
		'email' 		=> $_REQUEST['email'], 
		'about_me'      => $_REQUEST['about_me'],
		'dir' 			=> $dir,
	);
	
	if(!empty($profileObj['about_me']))
	{
		updateAboutMeByProfileID( $profileObj['id'], $profileObj['about_me']);
		header('Location: ../index.php?view=editprofile');
	}
	else
	{
		header('Location: ../index.php?view=editprofile');
	}

	
	if(!empty($profileObj['first_name']))
	{
		if(!empty($profileObj['last_name']))
		{
			if(!empty($profileObj['position']))
			{
				if(!empty($profileObj['email']))
				{
					updateProfile($profileObj);
					header('Location: ../index.php?view=editprofile');
				}
				else
				{
					header('Location: ../index.php?view=editprofile');
				}
				
			}
			else
			{
				header('Location: ../index.php?view=editprofile');
			}
		}
		else
		{
			header('Location: ../index.php?view=editprofile');
		}
	}
	else
	{
		header('Location: ../index.php?view=editprofile');
	}
?>