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
            
           if (!isset($name) || $name == ""|| !isset($password) || $password == "")
				{
					echo "Please Complete Sign-Up Form";
				}
			else {
			
					$existing = 'SELECT * FROM person WHERE name = :username';
					$existstmt = $db->prepare($existing);
					$existstmt->bindValue(':username', $username);
					$existstmt->execute();
					while ($row = $existstmt->fetch(PDO::FETCH_ASSOC)){
							echo $row['id'];
					}
					
		
					
					/*$username = htmlspecialchars($name);
					$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
			 		$query = 'INSERT INTO person(name, password) VALUES(:username, :password)';
					$statement = $db->prepare($query);
					$statement->bindValue(':username', $username);
					$statement->bindValue(':password', $hashedPassword);
					$statement->execute();
					
					echo "User " . $username . " has been added to Pantry Pro!";*/
				}
        }


    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
    

?>