<?php
	include("../../lib/lib.php");
	
	$campaignObj = array(
		'campaign_name'     => $_REQUEST['campaign_name'],
		'project_id'        => $_REQUEST['project_id'],
		'campaign_source'   => $_REQUEST['campaign_source'],
		'campaign_url' 		=> $_REQUEST['campaign_url'],
		'status' 			=> $_REQUEST['status'],
	);
		
	//check if empty
	if( !empty($campaignObj['campaign_url']) )
	{	
		if( !empty($campaignObj['campaign_name']))
		{
			//create a campaign/add into database
			createCampaign($campaignObj['project_id'],$campaignObj['campaign_name'], $campaignObj['campaign_source'], $campaignObj['campaign_url'], $campaignObj['status']);
			//redirect to campaign page
			header('Location: ../index.php?view=campaign');
		}
	}
	else
	{
		//redirect to campaign page
		header('Location: ../index.php?view=campaign');
	}
?>