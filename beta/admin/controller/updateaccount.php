<?php
	include("../../lib/lib.php");
	session_start();
	$user_id = $_REQUEST['user_id']; //grab user ID
	$current_password = $_REQUEST['current_password']; //grab the current password
	$current_user = getUserByID($user_id); //grab the user id, returns array

	$currentUserPassword = $current_user[0][password]; //get the current password of user from db
	
	//current password hash
	$currentPassword_hash = hash("sha256", $current_password);
	
	//retrieve new and retyped password
	$new_password = $_REQUEST['new_password'];
	$new_password_hash = hash("sha256", $new_password);
	//hash both of them
	$retype_new_password = $_REQUEST['retype_new_password'];
	$retype_new_password_hash = hash("sha256", $retype_new_password);
	
	
	
	//compare new hashed passwords
	if( $currentPassword_hash == $currentUserPassword)
	{
		if(strlen($new_passwod) >= 6 && !empty($newpassword) )
		{
			//if the current passwords match
			if( $new_password_hash == $retype_new_opassword_hash )
			{
				//update password
				$_SESSION['passwordChangeStatus'] = "Sucess";
				updateUserPassword( $user_id, $new_password_hash);
			}
			else
			{
				//report error in new password and retyped password, redirect back to edit account page
				header('Location: ./index.php?view=editaccount');
			}
		}
		else
		{
			//boot them if their current passwords don't match
			header('Location: ../../logout.php');
		}
	}
	
	else
	{
		
	}
?>