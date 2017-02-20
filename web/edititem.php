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
    
    	$stmt = $db->prepare("UPDATE item SET name = :name, expdate = :expdate, quantity = :quantity WHERE id = :id");
				$stmt->bindParam(':name', $name);
				$stmt->bindParam(':expdate', $exp);
				$stmt->bindParam(':quantity', $quantity);
				$stmt->bindParam(':id', $itemID );
				$stmt -> execute();
    
	
     /*  if ($category){
       			$stmt = $db
            	$stmt = $db->prepare("INSERT INTO itemcategory(item_id, category_id) VALUES ((SELECT currval('item_id_seq')), :category_id)");
            	$stmt->bindParam(':category_id', $category);
            	$stmt -> execute();
            }*/

	echo pg_last_error($db);
    
    
    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
  

?>