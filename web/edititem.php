<?php

	session_start();

	require ("dbConnect.php");
	$db = get_db();

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $itemID = strip_tags(trim($_POST["modalID"]));
    $name = strip_tags(trim($_POST["modalItemName"]));
    $quantity = strip_tags(trim($_POST["modalQuantity"]));
    $exp = strip_tags(trim($_POST["modalExpDate"]));
    
    echo "call working : " . $itemID ." ". $name ." ". $quantity ." ". $exp;
    
    
    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
    
    //TO DO Add delete user functionality

?>