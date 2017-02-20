<?php

	session_start();

	require ("dbConnect.php");
	$db = get_db();

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    			$selectVal = $_POST['selectVal'];
    			echo "PHP: " . $selectVal;
    
    			/*$idquery = $db->prepare("SELECT id FROM person WHERE name = :name");
    		    $idquery -> bindParam(':name', $_SESSION['username']);
    		    $idquery -> execute();
    		    $idresult =  $idquery -> fetch(PDO::FETCH_ASSOC);
				$id = $idresult['id'];
    	
     			$stmt = $db->prepare("SELECT * FROM item INNER JOIN itemcategory ON item.id = itemcategory.item_id WHERE itemcategory.category_id='10' AND itemcategory.person_id = '25'");
     			$stmt -> bindParam(':id', $id);
				$stmt -> execute();
				$result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
				$jsonresult = json_encode($result);
				
				echo $jsonresult;*/
    
    
    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
    
    //TO DO Add delete user functionality

?>