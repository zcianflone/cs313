<?php

	require ("dbConnect.php");
	$db = get_db();

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["name"]));
        $quantity = strip_tags(trim($_POST["quantity"]));
        $exp = strip_tags(trim($_POST["exp"]));
        $id = strip_tags(trim($_POST["id"]));

           // Set a 200 (okay) response code.
            http_response_code(200);
            
            //account for the case where the user doesn't insert an expdate
            
            //this code only works where pantry_id is synonymous with user id.  
            //if multiple pantries eventually become supported, the code will need to change.
        
        	//for the case that we have an exp date
            if ($exp){
            	$stmt = $db->prepare("INSERT INTO item(name, expdate, quantity, pantry_id) VALUES (:name, :expdate, :quantity, :pantry_id)");
				$stmt->bindParam(':name', $name);
				$newexp = date('Y-m-d', strtotime($exp));
				$stmt->bindParam(':expdate', $newexp);
				$stmt->bindParam(':quantity', $quantity);
				$stmt->bindParam(':pantry_id', $id);
				$stmt -> execute();
            }
            //when the user doesn't enter an exp date
            else{
            	$stmt = $db->prepare("INSERT INTO item(name, quantity, pantry_id) VALUES (:name, :quantity, :pantry_id)");
				$stmt->bindParam(':name', $name);
				$stmt->bindParam(':quantity', $quantity);
				$stmt->bindParam(':pantry_id', $id);
				$stmt -> execute();
            }
           
            //echo "Item: " . $name ." ". $quantity ." ". $exp . " ".$id; 

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
    
    //TO DO Add delete user functionality

?>