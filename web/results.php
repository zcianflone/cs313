<html>
<body>



</body>
</html

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Computing Survey</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <style>
    /* Bootstrap was being fussy about an external stylesheet.  This isn't inline, so hopefully it's acceptable
    I need to figure out how to use an external stylesheet with Bootstrap*/
    .row.content {height: 1500px}
    
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
      <h3>Survey</h3>
      <ul class="nav nav-pills nav-stacked">
        <li><a data-toggle="pill" href="#questions">Questions</a></li>
        <li class="active"><a data-toggle="pill" href="#results">Results</a></li>
      </ul><br>
    </div>

    <div class="col-sm-9">
    <div class="tab-content">
    
    
  	</div>
    
    
    <div id="results" class="tab-pane fade in active">
    	<?php  
    	$resultsfile = fopen("results.txt", "r+") or die ("Unable to open file!");
    	
    	while(!feof($resultsfile)) {
    	
    		echo fgets($resultsfile) ."<br>";
    		    	
    		/*switch (fgets($resultsfile)){
    			case "macOS":
    				$macOS = fgets($resultsfile);
    			default:
    				echo "nada";*/
    			
  				}
  			}
  			
  			echo "Number of votes for macOS = ". $macOS;
    	?>
    	
 		<?php echo "OS: ".$_POST['OS'];?><br>
 		<?php echo "Lang: ". $_POST["lang"]; ?>
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

 