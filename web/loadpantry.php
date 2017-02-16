<?php

	session_start();

	require ("dbConnect.php");
	$db = get_db();

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
     			$stmt = $db->prepare("SELECT * FROM item");
				$stmt -> execute();
				$result = $stmt -> fetch(PDO::FETCH_ASSOC);
				$jsonresult = json_encode($result);
				
				echo $jsonresult;
    
    
    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
    
    //TO DO Add delete user functionality

?>