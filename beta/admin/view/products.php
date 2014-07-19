<h1><i class="icon-gamepad"></i>Products</h1>

<?php
	$products = getAllProducts();
	print"<pre>";print_r($products);print "</pre>";
?>

<div class="row-fluid">
	<div class ='span12'>
		<div class="box box-black">
			<div class="box-title">
				<h3>Push to Product</h3>
				<div class="box-tool">
					<a href='#' data-action='collapse'><i class='icon-chevron-down'></i></a>
				</div>
			</div>
			<div class="box-content" style="display:none;">
				<form class="form-horizontal" action="./controller/addproduct.php" method="post">
					<div class="control-group">
						<label class="control-label">Project to Push</label>
						<div class="controls">
							<select class="input-large" tabindex="1" name="project_id">
							<?php
								$projects = getAllProjects();
								print_r($projects);
									
								for( $i = 0; $i < sizeOf($projects); $i++)
								{	
									print "<option value='".$projects[$i][id]."'>".$projects[$i][name]."</option>";
								}
							?>
							</select>
						</div>
					</div>
					<div class="control-group last">	
						<label class="control-label">Price</label>
						<div class="controls">
							<input  class="input-xlarge" type="text" name="price">
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary"><i class="icon-plus"></i> Push</button>
					</div>
				</form>
			</div>	
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span12">
		<div class="box box-black">
			<div class="box-title">
				<h3>Products</h3>
			</div>
			<div class="box-content">
				<?php
					$products = getAllProducts();
					
					for( $i = 0; $i < sizeOf($products); $i++ )
					{
						if($i%3 == 0)
						{	
							//new row, create a row-fluid
							print "<div class = 'row-fluid'>";
						}
						
						$project = getProjectByProjectID($products[$i][project_id]);
						
						print "<div class='span4'>";
						print "<div class='box box-black'>";
						print "<div class='box-title'><h3>".$project[0][name]."</h3></div>";
						print "<div class='box-content'>";
						
						print "<p>Price: $".$products[$i][price]."</p>";
						print "</div>"; //close box content
						print "</div>"; //close box
						print "</div>"; //close span
						
						if( ($i+1)%3 == 0 || $i == sizeOf($projects) )
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