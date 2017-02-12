<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pantry Pro</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <style>
    .row.content {height: 2500px}
    
    /* Sets Side Nav dimensions and color */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Simple Footer */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* Css for small screens */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>


<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
    <br> 
      <h3>Pantry Pro</h3>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a data-toggle="pill" href="#pantry">Pantry</a></li>
        <li><a data-toggle="pill" href="#additem">Add Pantry Item</a></li>
        <li><a data-toggle="pill" href="#recipes">Recipes</a></li>
        <li><a data-toggle="pill" href="#createrecipe">Create Recipe</a></li>
      </ul><br>
    </div>

    <div class="col-sm-9">
    <div class="tab-content">
    
 	<div id="pantry" class="tab-pane fade in active">
  		<h2>All Pantry Items</h2>
  		<div class="list-group">
    
    <?php

	$dbUrl = getenv('DATABASE_URL');

	$dbopts = parse_url($dbUrl);

	$dbHost = $dbopts["host"];
	$dbPort = $dbopts["port"];
	$dbUser = $dbopts["user"];
	$dbPassword = $dbopts["pass"];
	$dbName = ltrim($dbopts["path"],'/');

	$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
	
	
	

	foreach ($db->query('SELECT name FROM item') as $row)
	{
	
		//makes each entry into a link that navigates to details page
		$link = str_replace(' ','_', $row['name']);
		
		
		echo "<a href=\"pantryitem.php?itemName=". $link ."\" class=\"list-group-item\">".$row['name']. "</a>";
	}
	?>
	
	 </div>
	
	
	
	<form action="action_page.php" method="post">
  		<br>
  		<br>
 		 Search:<br>
  		<input type="text" name="desireditem">
 		<br>
  		<br>
  		<input type="submit" value="Submit">
	</form> 
	
	</div>
	
	<div id="additem" class="tab-pane fade">
	
		<h3>Add New Item</h3>
		<hr>
		<h4>Under Construction!</h4>
    	
    	<form action="" method="post">
  		<br>
 		 Name:<br>
  		<input type="text" name="name">
 		<br>
  		<br>
  		Quantity:<br>
  		<input type="text" name="quantity">
 		<br>
  		<br>
  		Expiration Date:<br>
  		<input type="text" name="quantity">
 		<br>
  		<br>
  		<input type="submit" value="Submit">
	</form> 
  
    </div>
    
    <div id="recipes" class="tab-pane fade">
    
    <p>Under Construction!</p>
    
    </div>
    
    <div id="createrecipe" class="tab-pane fade">
    
    <p>Under Construction!</p>
    
    </div>
    
  	</div>
  	
  	
    
    
    
    </div>
            </div>
          </div>

<footer class="container-fluid">
  <p>Zac Cianflone</p>
</footer>

</body>
</html>

 