		
    	<?php  
    	/*paired down results page that loads via AJAX on main page*/
    	$resultsFile = "results.txt";
    	$fh = fopen($resultsFile, 'r+'); //opening file
    	$jsonString = fread ($fh, filesize($resultsFile)); //makes a big string out of file
    	$resultsAssoc = array ();
    	$resultsAssoc = json_decode($jsonString, true); //turning jsonString in AssocArray
    	fclose($fh);
    	
    	
    	echo "<h2>Survey Results<h2><hr>";
    	echo "<h3><small>Total Number of Votes: </small>". $resultsAssoc["TotVotes"]."<h3>";
    	
    	foreach ($resultsAssoc as $x => $x_value){
    	
    	//category name will have value of -1.  when we hit that value, we change the progress bar color and output the header
    	
    	if ($x_value == "-1"){
    	echo "<h3><small>" . $x . "</small></h3><hr>";
    	}
    	
    	else if ($x != "TotVotes"){
    	echo "<h4><small>" . $x . "</small></h4>";
    	echo "<div class=\"progress\">";
    	echo "<div class=\"progress-bar progress-bar-success progress-bar-striped\" role=\"progressbar\"";
    	echo "aria-valuenow=\"".$x_value."\" aria-valuemin=\"0\" aria-valuemax=\"".$resultsAssoc["TotVotes"]."\" style=\"width:".($x_value/$resultsAssoc["TotVotes"])*100 ."%\">";
    	echo $x_value;
    	echo "</div>";
		echo "</div>";
		echo "<br> <br>";
		}
		
		}

    	
    	?>


 