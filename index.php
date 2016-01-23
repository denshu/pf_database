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
            <li class="active"><a href="#">Characters</a></li>
            <li><a href="#">Locations</a></li>
            <li><a href="#">About</a></li>
          </ul>
        </div>
      </div>
    </nav>

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

								$con = mysqli_connect("localhost","root","","pf_database");

								if (mysqli_connect_errno())
								  {
								  echo "Failed to connect to MySQL: " . mysqli_connect_error();
								  }

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
									mysqli_close($con);
								?>
								<!-- Sorting method -->
								<div class="form-group"><label for="sort-by">Sort By</label><select class="form-control" id="sort-by">
								<option>Name</option>
								<option>HP</option>
								<option>SP</option>
								<option>STR</option>
								<option>DEX</option>
								<option>AGI</option>
								<option>INT</option>
								</select></div>

								<button type="button" class="btn btn-default btn-lg">
								  <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search
								</button>
				      </div>
				    </div>
				  </div>
				  </div>
			</div>
			</div>
			<div class="character-grid">
<?php

	$con = mysqli_connect("localhost","root","","pf_database");

	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	$selection = "SELECT name,static_sprite FROM characters";
	$result = mysqli_query($con,$selection);
	
	do {
		echo '<div class="row">';
		for ($x = 0; $x <= 3; $x++) {
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			if ($row != NULL) {
				echo '<div class="col-md-3 character" style="text-align:center">';
				echo '<h4>',$row["name"],'</h4>';
				echo '<img src="',$row["static_sprite"],'" />';
				echo '</div>';
			}
		}
		echo '</div>';
	} while($row != NULL);
	
	mysqli_free_result($result);
	mysqli_close($con);
?>
			</div>
		</div>
		</div>
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script>
	$(window).on("load", function() {
		// $('.character').addClass('in');
		$('.character').each(function(index) {
			//$(this).addClass('in');
			$(this).delay(250*index).queue(function() { $(this).addClass('in').dequeue(); });

		});

	});
	</script>
</body>
</html>