<?php
session_start();
if($_SESSION["voted"]) {
    header("Location: http://agile-forest-80945.herokuapp.com/results.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Zac's Survey</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <style>
    /* Bootstrap was being fussy about an external stylesheet.  This isn't inline, so hopefully it's acceptable
    I need to figure out how to use an external stylesheet with Bootstrap*/
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
<body onload="loadResults()">

<script>
function loadResults() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("results").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "staticresults.php", true);
  xhttp.send();
}
</script>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
    <br> 
      <h3>Zac's Survey</h3>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a data-toggle="pill" href="#questions">Questions</a></li>
        <li><a data-toggle="pill" href="#results">Results</a></li>
      </ul><br>
    </div>

    <div class="col-sm-9">
    <div class="tab-content">
    
    
    
    
    <div id="questions" class="tab-pane fade in active">
    <form action="results.php" method="post">
    <h3><small>OS Preference</small></h3><hr>
    	<div class="radio">
  			<label><input type="radio" name="OS" value="macOS">macOS</label>
		</div>
		<div class="radio">
  			<label><input type="radio" name="OS" value="Windows">Windows</label>
		</div>
		<div class="radio">
  			<label><input type="radio" name="OS" value="Linux">Linux</label>
		</div>
		<div class="radio">
  			<label><input type="radio" name="OS" value="ChromeOS" >ChromeOS</label>
		</div>
		
	
    <h3><small>Favorite Programming Language</small></h3><hr>
    	<div class="radio">
  			<label><input type="radio" name="lang" value="C++">C++</label>
		</div>
		<div class="radio">
  			<label><input type="radio" name="lang" value="Java">Java</label>
		</div>
		<div class="radio">
  			<label><input type="radio" name="lang" value="JavaScript" >JavaScript</label>
		</div>
		<div class="radio">
  			<label><input type="radio" name="lang" value="PHP" >PHP</label>
		</div>
		<div class="radio">
  			<label><input type="radio" name="lang" value="Pascal" >Pascal</label>
		</div>
		<div class="radio">
  			<label><input type="radio" name="lang" value="Fortran" >Fortran</label>
		</div>
		
		<h3><small>Favorite Beatle</small></h3><hr>
    	<div class="radio">
  			<label><input type="radio" name="beatle" value="John">John</label>
		</div>
		<div class="radio">
  			<label><input type="radio" name="beatle" value="Ringo">Ringo</label>
		</div>
		<div class="radio">
  			<label><input type="radio" name="beatle" value="Paul" >Paul</label>
		</div>
		<div class="radio">
  			<label><input type="radio" name="beatle" value="George" >George</label>
		</div>
	
		
		    <h3><small>Favorite Original Trilogy Star Wars Movie</small></h3><hr>
    	<div class="radio">
  			<label><input type="radio" name="starwars" value="A New Hope">A New Hope</label>
		</div>
		<div class="radio">
  			<label><input type="radio" name="starwars" value="Empire Strikes Back">Empire Strikes Back</label>
		</div>
		<div class="radio">
  			<label><input type="radio" name="starwars" value="Return of the Jedi" >Return of the Jedi</label>
		</div>
	
	
	
		
		<br>
		
		<hr>
		
		<br>
		
		<button type="submit" class="btn btn-default">Submit</button>
    
    	</form>
      
    
  	</div>
    
    
    <div id="results" class="tab-pane fade">
    
  
    </div>
    </div>
            </div>
          </div>
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

 