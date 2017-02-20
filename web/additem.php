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
        $category = $_POST["category"];
        

           // Set a 200 (okay) response code.
            http_response_code(200);
            
    
        	
        	$idstmt = $db->prepare("SELECT * FROM person WHERE name = :name");
			$idstmt->bindParam(':name', $_SESSION['username']);
			$idstmt -> execute();
			
			
			$result = $idstmt -> fetch(PDO::FETCH_ASSOC);
			
			$id = $result["id"];
			
			
            if ($exp){
            	$stmt = $db->prepare("INSERT INTO item(name, expdate, quantity, person_id) VALUES (:name, :expdate, :quantity, :person_id)");
				$stmt->bindParam(':name', $name);
				$newexp = date('Y-m-d', strtotime($exp));
				$stmt->bindParam(':expdate', $newexp);
				$stmt->bindParam(':quantity', $quantity);
				$stmt->bindParam(':person_id', $id );
				$stmt -> execute();
				
				echo "Item Added!";
            }
            //when the user doesn't enter an exp date
            else{
            	$stmt = $db->prepare("INSERT INTO item(name, quantity, person_id) VALUES (:name, :quantity, :person_id)");
				$stmt->bindParam(':name', $name);
				$stmt->bindParam(':quantity', $quantity);
				$stmt->bindParam(':person_id', $id);
				$stmt -> execute();
				
				echo "Item Added!";
            }
            
            if ($category){
            	$stmt = $db->prepare("INSERT INTO itemcategory(item_id, category_id, person_id) VALUES ((SELECT currval('item_id_seq')), :category_id, :person_id)");
            	$stmt->bindParam(':category_id', $category);
            	$stmt->bindParam(':person_id', $id);
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