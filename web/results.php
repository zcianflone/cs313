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
    	$resultsFile = "results.txt";
    	$fh = fopen($resultsFile, 'r'); //opening file
    	$theData = fread ($fh, filesize($resultsFile)); //makes a big string out of file
    	$resultsAssoc = array ();
    	$my_array = explode ("\n", $theData); //explodes string into array.
    	foreach ($my_array as $line)
    	{
    		$tmp = explode("@", $line); //cuts each line in half.
    		$resultsAssoc[$tmp[0]] = $tmp[1]; //creates associative array.  key is name and value is how many votes.
    		
    		//if current key/choice matches the radio button the user selected (i.e. the vote) the num of votes increments in the AssocArray
    		if (($tmp[0] == ($_POST['OS']) || ($tmp[0] == $_POST["lang"])){ 
    			$resultsAssoc[$tmp[0]] = $tmp[1]++;
    		}
    		
    	}
    	
    	fclose ($fh);
    	
    	echo "<h2>Survey Results<h2><hr>";
    	echo "<h3><small>Total Number of Votes: </small>". $resultsAssoc["TotVotes"];
    	
    	foreach ($resultsAssoc as $x => $x_value){
    	
    	//category name will have value of -1.  when we hit that value, we change the progress bar color and output the header
    	
    	if ($x_value == "-1"){
    	echo "<h3><small>" . $x . "</small></h3><hr>";
    	}
    	
    	else if ($x != "TotVotes"){
    	echo "<h4><small>" . $x . "</small></h4>";
    	echo "<div class=\"progress\">";
    	echo "<div class=\"progress-bar progress-bar-success progress-bar-striped active\" role=\"progressbar\"";
    	echo "aria-valuenow=\"".$x_value."\" aria-valuemin=\"0\" aria-valuemax=\"".$resultsAssoc["TotVotes"]."\" style=\"width:".($x_value/$resultsAssoc["TotVotes"])*100 ."%\">";
    	echo $x_value;
    	echo "</div>";
		echo "</div>";
		echo "<br> <br>";
		}
		
		}
    	
    	
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

 