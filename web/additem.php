<?php

	require ("dbConnect.php");
	$db = get_db();

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["name"]));
        $quantity = strip_tags(trim($_POST["quantity"]));
        $exp = strip_tags(trim($_POST["exp"]));
        //$id = strip_tags(trim($_POST["id"]));

           // Set a 200 (okay) response code.
            http_response_code(200);
           
            echo "Item " . $name . $quantity . $exp;

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
    
    //TO DO Add delete user functionality

?>