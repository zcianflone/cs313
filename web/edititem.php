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
    $category = $_POST["category"];
    
    $idstmt = $db->prepare("SELECT * FROM person WHERE name = :name");
	$idstmt->bindParam(':name', $_SESSION['username']);
	$idstmt -> execute();
			
			
	$result = $idstmt -> fetch(PDO::FETCH_ASSOC);
			
	$personID = $result["id"];
    
    	$stmt = $db->prepare("UPDATE item SET name = :name, expdate = :expdate, quantity = :quantity WHERE id = :id");
				$stmt->bindParam(':name', $name);
				$stmt->bindParam(':expdate', $exp);
				$stmt->bindParam(':quantity', $quantity);
				$stmt->bindParam(':id', $itemID );
				$stmt -> execute();
    
	
       if ($category){
       			$stmt = $db->prepare("DELETE FROM itemcategory WHERE item_id = :itemid");
       			$stmt->bindParam(':itemid', $itemID);
       			$stmt -> execute();
            	$stmt = $db->prepare("INSERT INTO itemcategory(item_id, category_id, person_id) VALUES (:itemID, :category_id, :person_id)");
            	$stmt->bindParam(':itemID', $itemID);
            	$stmt->bindParam(':category_id', $category);
            	$stmt->bindParam(':person_id', $personID);
            	$stmt -> execute();
            }

	echo pg_last_error($db);
    
    
    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
  

?>