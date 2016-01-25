<html>
<head>
	<title>Project FLIPNOTIK Database</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Raleway:200,400,700' rel='stylesheet' type='text/css'>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/database.css" rel="stylesheet">

</head>
<body>
	<!-- Navigation bar on top of window -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project FLIPNOTIK Database</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown active"> 
            	<a id="dropdown-characters" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
            	Characters <span class="caret"></span></a> 
        		<ul class="dropdown-menu" aria-labelledby="dropdown-characters"> 
        		<li class="active"><a href="#">Playable Characters</a></li> 
        		<li><a href="#">Antagonists and NPCs</a></li> 
        		<li><a href="#">Statistics</a></li> 
        		<li><a href="#">Compare Character Stats</a></li> 
        		</ul>
    		</li>
            <li><a href="#">Locations</a></li>
            <li><a href="#">About</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Sidebar -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Playable Characters <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Antagonists and NPCs</a></li>
            <li><a href="#">Statistics</a></li>
            <li><a href="#">Compare Character Stats</a></li>
          </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

        <div class="row placeholders">
            

          <h1 class="sub-header">Playable Characters</h1>
          <div class="container-fluid">
  			<div class="row">
	  			<div class="panel-group" id="accordion" role="tablist">
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingOne">
				      <h3 class="panel-title">
				        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
				          Refine Search
				        </a>
				      </h3>
				    </div>
				    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
				      <div class="panel-body">
				      		
							  	<?php

								require_once('config.php');

								// Selecting by gender
								echo '<div class="form-group"><label for="select-gender">Gender</label><select class="form-control" id="select-gender"><option></option>';
								$selection3 = "SELECT DISTINCT gender FROM characters ORDER BY gender";
								$result3 = mysqli_query($con,$selection3);
								$row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
									echo '<option>',$row3["gender"],'</option>';
								while($row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC)) {
									echo '<option>',$row3["gender"],'</option>';
								}
								echo '</select></div>';

								// Selecting by nation
								echo '<div class="form-group"><label for="select-nation">Nation</label><select class="form-control" id="select-nation"><option></option>';
								$selection = "SELECT DISTINCT nation FROM characters ORDER BY nation";
								$result = mysqli_query($con,$selection);
								$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
									echo '<option>',$row["nation"],'</option>';
								while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
									echo '<option>',$row["nation"],'</option>';
								}
								echo '</select></div>';

								// Selecting by location
								echo '<div class="form-group"><label for="select-location">Location</label><select class="form-control" id="select-location"><option></option>';
								$selection2 = "SELECT DISTINCT location FROM characters ORDER BY location";
								$result2 = mysqli_query($con,$selection2);
								$row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
									echo '<option>',$row2["location"],'</option>';
								while($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)) {
									echo '<option>',$row2["location"],'</option>';
								}
								echo '</select></div>';

								mysqli_free_result($result);
								?>
								<!-- Sorting method -->
								<div class="form-group"><label for="sort-by">Sort By</label><select class="form-control" id="sort-by">
								<option>name</option>
								<option>hp_rating</option>
								<option>sp_rating</option>
								<option>str_rating</option>
								<option>dex_rating</option>
								<option>agi_rating</option>
								<option>int_rating</option>
								</select></div>

								<button type="button" class="btn btn-default btn-lg" id="search-button">
								  <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search
								</button>
				      </div>
				    </div>
				  </div>
				  </div>
			</div>
			</div>

			<!-- Creating the grid of characters -->
			<div id="character-grid-container">
			<div class="character-grid">
			<?php
				$selection = "SELECT name,static_sprite FROM characters ORDER BY name";
				$result = mysqli_query($con,$selection);
				
				do {
					echo '<div class="row">';
					for ($x = 0; $x <= 3; $x++) {
						$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
						if ($row != NULL) {
							echo '<div class="col-xs-3 character" style="text-align:center" data-toggle="modal" data-target="#characterDetails">';
							echo '<h4 value="',$row["name"],'">',$row["name"],'</h4>';
							echo '<img src="',$row["static_sprite"],'" />';
							echo '</div>';
						}
					}
					echo '</div>';
				} while($row != NULL);
				
				mysqli_free_result($result);
			?>
			</div></div>
		</div>
		</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="characterDetails" tabindex="-1" role="dialog" aria-labelledby="characterDetailsLabel">
		  <div class="vertical-alignment-helper">
		  <div class="modal-dialog vertical-align-center" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h2 class="modal-title" id="characterDetailsLabel"></h2>
		      </div>
		      <div class="modal-body" id="character-detail-body"></div>

		      <!-- Inserting modal content -->

		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		  </div>
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>

    <script>
	$(window).on("load", function() {
		// $('.character').addClass('in');
		$('.character').each(function(index) {
			//$(this).addClass('in');
			$(this).delay(150*index).queue(function() { $(this).addClass('in').dequeue(); });

		});

	});
	</script>
</body>
</html>