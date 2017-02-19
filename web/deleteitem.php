<?php

	session_start();

	require ("dbConnect.php");
	$db = get_db();

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //ex: DELETE FROM item WHERE id = '30'
    
    			$stmt = $db->prepare("DELETE FROM item WHERE id = :id");
				$stmt->bindParam(':id',  $_POST["id"]);
				$stmt -> execute();
    
    			
				echo "deleted id: " . $_POST["id"];
    
    
    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
    
    //TO DO Add delete user functionality

?>