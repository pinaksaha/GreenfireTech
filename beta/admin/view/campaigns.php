<h1><i class="icon-flag-alt"></i>Campaigns</h1>


<div class="row-fluid">
	<div class="span12">
		<div class="box box-black">
			<div class="box-title">
				<h3>Add Campaign</h3>
				<div class="box-tool">
                    <a data-action="collapse" href="#"><i class="icon-plus"></i></a>
                </div>
			</div>
			<div class="box-content" >
				<form class="form-horizontal" action="./controller/addcampaign.php" method="post">
					<div class="control-group">	
						<label class="control-label">Campaign Name</label>
						<div class="controls">
							<input  class="input-xlarge" type="text"  name="campaign_name">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Project Name </label>
						<div class="controls">
							<select class="input-large" tabindex="1" name="project_id">
							<?php
								$projects = getAllProjects();
								//print_r($projects);
									
								for( $i = 0; $i < sizeOf($projects); $i++)
								{	
									print "<option value='".$projects[$i][id]."'>".$projects[$i][name]."</option>";
								}
							?>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Campaign Source</label>	
						<div class="controls">
							<select class="input-large" tableindex="1" name="campaign_source">
								<option value = "Kickstarter">Kickstarter</option>
								<option value = "Indiegogo">Indiegogo</option>
							</select>
						</div>
					</div>
					<div class="control-group">	
						<label class="control-label">Campaign URL</label>
						<div class="controls">
							<input  class="input-xlarge" type="text"  name="campaign_url">
						</div>
					</div>
					<div class="control-group last">
						<label class="control-label">Campaign Status</label>	
						<div class="controls">
							<select class="input-large" tableindex="1" name="status">
								<option value = "Open">Open</option>
								<option value = "Closed">Closed</option>
							</select>
						</div>
					</div>
					<div class="form-actions">
						<button class="btn btn-primary" type="submit">
						<i class="icon-ok"></i>
						Add
						</button>
					</div>
				</form>
			</div> <!--box content end -->
		</div>
	</div>
</div>

<div class ="row-fluid">
	<div class="span12">
		<div class="box box-black">
			<div class="box-title">
				<h3>Active Campaigns</h3>
			</div>
			<div class="box-content">
				<?php
					$campaigns = getActiveCampaigns();
					for( $i = 0; $i < sizeOf($campaigns); $i++ )
					{
						if($i%3 == 0)
						{	
							//new row, create a row-fluid
							print "<div class = 'row-fluid'>";
						}
						
						$project = getProjectByProjectID($campaigns[$i][project_id]);
						
						print "<div class='span4'>";
						print "<div class='box box-black'>";
						print "<div class='box-title'><h3>".$campaigns[$i][name]."</h3></div>";
						print "<div class='box-content'><p>Source: ".$campaigns[$i][source]."</p>";
						print "<p>Project Name: ".$project[0][name]."</p>";
						print "<p>URL: <a href='".$campaigns[$i][url]."'>".$campaigns[$i][url]."</a></p>";
						print "<p>Status: ".$campaigns[$i][status]."</p>";
						print "<br>";
						
						//form
						$campaignID = $campaigns[$i][id];
						print "<form action='./controller/deletecampaign.php' class='form-horizontal form-bordered form-row-stripped' method='post'>";
						
						//add hidden tag
						print "<input type='hidden' name='campaign_id' value = '".$campaigns[$i][id]."'/>";
						
						//edit/delete/complete buttons
						print "<a href='./index.php?view=editcampaign&id=$campaignID' class='btn btn-block btn-primary btn-large'><i class='icon-edit'></i> Edit</a>";
						print "<button type='submit' class='btn btn-block btn-danger btn-large'><i class='icon-remove'></i> Delete</button>";
						
						print "</form>"; //form close
						print "</div>"; //content close
						print "</div>"; //box close
						print "</div>"; //span close
						
						if( ($i+1)%3 == 0 || $i == sizeOf($campaigns) )
						{
							//close row-fluid
							print "</div>";
						}
					}
				?>
			</div>
		</div>
	</div>
</div>