<?php
	include("../../lib/lib.php");
	include_once("../../lib/fileUpload.php");
	
	//directory to save the new uploaded image
	$saveTo = "../../project_pic/";
	
	//get the project name
	$project_name = $_REQUEST['projectName'];
	
	//get project description
	$project_description = $_REQUEST['description'];
	
	//print"<pre>";print_r($_FILES);print "</pre>";
	
	if($_FILES[file][size] != 0)
	{
		//store new image
		$dir = storeImg($_FILES,$project_name,$saveTo);
	}
	else
	{
		//use default image if no file uploaded
		$dir = "../../project_pic/project_default.png";
	}
	
	//check if they are empty
	if( !empty($project_name) )
	{
		if( !empty($project_description ))
		{
			//create new project object
			createProject($project_name,$project_description,$dir);
			header('Location: ../index.php?view=project');
		}
		else
		{
			//if empty redirect to projects page
			header('Location: ../index.php?view=project');
		}
	}
	else
	{
		//if empty redirect to projects page
		header('Location: ../index.php?view=project');
	}
?>