<?php
	include_once('config.php');
?>
<div class="row placeholders npcModule">
	<h1 class="sub-header">Antagonists and NPCs</h1>
    <div class="container-fluid">
	<div class="row">
		<div class="panel-group" id="accordion" role="tablist">
			<div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="headingOne">
			    	<h3 class="panel-title">
			        	<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Search</a>
			      	</h3>
			    </div>
			    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
			    	<div class="panel-body">
					<?php
						// Selecting by gender
						echo '<div class="form-group"><label for="select-gender">Gender</label><select class="form-control" id="select-gender"><option></option>';
						$selection3 = "SELECT DISTINCT gender FROM npcs ORDER BY gender";
						$result3 = mysqli_query($con, $selection3);
						$row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
							echo '<option>', $row3["gender"], '</option>';
						while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
							echo '<option>', $row3["gender"], '</option>';
						}
						echo '</select></div>';

						// Selecting by nation
						echo '<div class="form-group"><label for="select-nation">Nation</label><select class="form-control" id="select-nation"><option></option>';
						$selection = "SELECT DISTINCT nation FROM npcs ORDER BY nation";
						$result = mysqli_query($con, $selection);
						$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
							echo '<option>', $row["nation"], '</option>';
						while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							echo '<option>', $row["nation"], '</option>';
						}
						echo '</select></div>';

						// Selecting by location
						echo '<div class="form-group"><label for="select-location">Location</label><select class="form-control" id="select-location"><option></option>';
						$selection2 = "SELECT DISTINCT location FROM npcs ORDER BY location";
						$result2 = mysqli_query($con, $selection2);
						$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
							echo '<option>', $row2["location"], '</option>';
						while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
							echo '<option>', $row2["location"], '</option>';
						}
						echo '</select></div>';

						mysqli_free_result($result);
						mysqli_free_result($result2);
						mysqli_free_result($result3); 
					?>
					  	<button type="button" class="btn btn-default btn-lg" id="search-button-npcs">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							Search
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<div id="character-grid-container">
		<div class="character-grid">
		<?php
			// Creating the grid of characters
			$selection4 = "SELECT name,static_sprite FROM npcs ORDER BY name";
			$result4 = mysqli_query($con, $selection4);
			do {
				echo '<div class="row">';
				for ($x = 0; $x <= 3; $x++) {
					$row = mysqli_fetch_array($result4, MYSQLI_ASSOC);
					if ($row != NULL) { 
					?>
						<div class="col-xs-3 character character-npc" style="text-align:center" data-toggle="modal" data-target="#characterDetails">
							<h4 value="<?php echo $row["name"]; ?>"><?php echo $row["name"]; ?></h4>
							<img src="<?php echo $row["static_sprite"]; ?>" />
						</div>
					<?php
					}
				}
				echo '</div>';
			} while($row != NULL);
			
			mysqli_free_result($result4);
		?>
		</div>
	</div>
</div>