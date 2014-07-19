<?php

	session_start();
	include_once("../lib/lib.php");
	include_once("../lib/fileUpload.php");
	
	$users_id = $_SESSION['Userid'];

	$users = getUserByID($users_id);
	
	$saveTo = "../profile_pic/";
	if(!empty($_FILES))
	{	
		$dir = storeImg( $_FILES, $users[0][username],$saveTo);
	}
	
	else
	{
		$dir = "../img/profile-default.jpg";
	}
	if(empty($_REQUEST))
	{
		$_SESSION['profile_error'] = "Fields Empty";
		header('Location: ../mkview/mkprofile.php');
	}
	$aboutMe = $_REQUEST['aboutme'];
	$profileObj = array(
	
		'user_id' 		=> 	$_SESSION['Userid'],
		'first_name' 	=> 	$_REQUEST['firstname'],
		'last_name'	 	=>	$_REQUEST['lastname'],
		'pic_dir'		=>  $dir,
		'position'		=>  $_REQUEST['position'],
		'email'			=>  $_REQUEST['email'],
	);
	
	if(!empty($profileObj['first_name']))
	{
				
		if(!empty($profileObj['last_name']))
		{
			if(!empty($profileObj['position']))
			{
				if(!empty($profileObj['email']))
				{
					createProfile($profileObj);
					$profiles = getProfileByUserID($_SESSION['Userid']);
					//print_r($profiles);
					$profile_id = $profiles[0][id];
					
					$aboutObj = array(
					
						'profile_id' =>	$profile_id,
						'about_me' => $aboutMe,
					);
					
					createAboutMe($aboutObj);
					header('Location: ../admin/index.php');
			
				}
				
				else
				{
					$_SESSION['profile_error'] = "Missing E-mail";
					header('Location: ../mkview/mkprofile.php');
				}
			}
			
			else
			{
				$_SESSION['profile_error'] = "You must have a position in the company";
				header('Location: ../mkview/mkprofile.php');
			}
			
		}
		
		else
		{
			$_SESSION['profile_error'] = "Missing Last Name";
			header('Location: ../mkview/mkprofile.php');
		}
	}
	else
	{
		$_SESSION['profile_error'] = "Missing First Name";
		header('Location: ../mkview/mkprofile.php');
		
	}
	
	$profile_id = getProfileByUseID($id)
	
	
	
	

?>