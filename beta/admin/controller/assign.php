<?php
	include("../../lib/lib.php");
	
	//get variables
	$project_id = $_REQUEST['project_id'];
	$user_id = $_REQUEST['user_id'];
	
	//create a new project_user
	assignUserToProject($project_id,$user_id);
	
	//reload page
	header('Location: ../index.php?view=project');
		
	$assigned = getAllUsersToProjects();
	print"<pre>";print_r($assigned);print "</pre>";
?>