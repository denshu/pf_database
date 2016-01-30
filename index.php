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
        		<li id="navbar-playable" class="active"><a href="#">Playable Characters</a></li> 
        		<li id="navbar-npcs"><a href="#">Antagonists and NPCs</a></li> 
        		<li id="navbar-statistics"><a href="#">Statistics (coming soon!)</a></li> 
        		<li id="navbar-compare"><a href="#">Compare Characters (coming soon!)</a></li> 
        		</ul>
    		</li>
            <li id="navbar-locations"><a href="#">Locations (coming soon!)</a></li>
            <li id="navbar-about" data-toggle="modal" data-target="#about-modal"><a href="#">About</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Sidebar -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li id="sidebar-playable" class="active"><a href="#">Playable Characters <span class="sr-only">(current)</span></a></li>
            <li id="sidebar-npcs"><a href="#">Antagonists and NPCs</a></li>
            <li id="sidebar-statistics"><a href="#">Statistics (coming soon!)</a></li>
            <li id="sidebar-compare"><a href="#">Compare Characters (coming soon!)</a></li>
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
				          Search
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
								mysqli_free_result($result2);
								mysqli_free_result($result3);
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
							echo '<div class="col-xs-3 character character-playable" style="text-align:center" data-toggle="modal" data-target="#characterDetails">';
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

		<!-- Modal for character stats -->
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

		<!-- Modal for About section -->
		<div class="modal fade" id="about-modal" tabindex="-1" role="dialog" aria-labelledby="aboutLabel">
		  <div class="vertical-alignment-helper">
		  <div class="modal-dialog vertical-align-center modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h2 class="modal-title" id="aboutLabel">About</h2>
		      </div>
		      <div class="modal-body" id="about-modal-body">
		      	
		      	<p><b>Project FLIPNOTIK</b> was a game I tried making in RPG Maker XP between 2009 and 2013. It was about eight friends, warped to 
		      a fantasy world with their memories erased, making their way through their new surroundings to find out who they are and why they were
		      brought to this world, while eventually playing significant roles in bringing peace to a land they once had nothing to do with. It's not
		      very original, so my selling point was its (planned) immense depth and characterization, influenced by the Suikoden series in which
		      each game features 108+ memorable characters banding together to confront a large-scale conflict.</p>
		      
		      <p>I also wrote a "prequel" novel for NaNoWriMo 2010. I never finished the game due to a myriad of things, including feature bloat, lofty
		      aspirations, a constantly expanding universe, barely any documentation, and a messy workflow. 
		      I don't think I'll ever be able to return to it and finish development, but at the very least it stands as a nice memory, 
		      a chronological account of the ideas and emotions I had put into it over the years.</p>
		      <p>Why did I make a database for an unfinished game? Because I can, I guess.</p>
		      <p>This website was developed from scratch using HTML with SVG animations, CSS, JavaScript, jQuery, AJAX, PHP, MySQL, and the Bootstrap framework for a responsive, mobile-friendly design. I spent 4 days working on it.</p>
		      </div>
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
		$('.character').each(function(index) {
			$(this).delay(120*index).queue(function() { $(this).addClass('in').dequeue(); });

		});

	});
	</script>
</body>
</html>
