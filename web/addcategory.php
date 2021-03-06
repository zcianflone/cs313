<?php

	session_start();

	require ("dbConnect.php");
	$db = get_db();

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["name"]));
        $quantity = strip_tags(trim($_POST["quantity"]));
        $exp = strip_tags(trim($_POST["exp"]));
       

           // Set a 200 (okay) response code.
            http_response_code(200);
            
    
        	//grabbing user id from db
        	$idstmt = $db->prepare("SELECT * FROM person WHERE name = :name");
			$idstmt->bindParam(':name', $_SESSION['username']);
			$idstmt -> execute();
			
			
			$result = $idstmt -> fetch(PDO::FETCH_ASSOC);
			
			$id = $result["id"];
			
			//inserting new item into db with the user id we just got
			$stmt = $db->prepare("INSERT INTO category(name, person_id) VALUES (:name, :id)");
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':id', $id );
			$stmt -> execute();
			
			echo "Added New Category!";
			
			
            //echo "Item: " . $name ." ". $quantity ." ". $exp . " ".$id; 

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
    
    //TO DO Add delete user functionality

?>