<?php
	include("../../lib/lib.php");
	$projectObj = array(
		'id' => $_REQUEST['project_id'],
		'project_name' 	=> $_REQUEST['project_name'],
		'project_description' 	=> $_REQUEST['project_description'],
	);

	if(!empty($projectObj['project_name']))
	{
		if( !empty($projectObj['project_description']))
		{
			updateProject($projectObj); //update
			//reload edit project page
			header("Location: ../index.php?view=project");
		}
		else
		{	
			//redirect to edit project page
			header('Location: ../index.php?view=project');
		}
	}
	else
	{
		//redirect to edit project page
		header('Location: ../index.php?view=project');
	}
?>