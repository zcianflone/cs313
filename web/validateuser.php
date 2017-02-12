<?php

	require ("dbConnect.php");
	$db = get_db();

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["name"]));
        $password = strip_tags(trim($_POST["password"]));

        if ( empty($name) OR empty($password)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! There was a problem with your submission. Please complete the form and try again.";
            exit;
        }
        else
        {
           // Set a 200 (okay) response code.
            http_response_code(200);
            
            
			$stmt = $db->prepare("SELECT * FROM person WHERE name = :name");
			$stmt->bindParam(':name', $name);
			$stmt -> execute();
			
			
			$result = $stmt -> fetch(PDO::FETCH_ASSOC);
			
			
			if (!$result){
				echo "Username or Password Didn't Match Our Records!";
			}
			else if($result['password'] == $password){
				echo "pantry.php?id=".$result['id'];
			}
			else{
				echo "Incorrect Password!";
			}
		

			
		
        }


    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
    
    //TO DO Add delete user functionality

?>