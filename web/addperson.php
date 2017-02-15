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
					$username = htmlspecialchars($name);
					$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
			 		$query = 'INSERT INTO login(username, password) VALUES(:username, :password)';
					$statement = $db->prepare($query);
					$statement->bindValue(':username', $username);
					$statement->bindValue(':password', $hashedPassword);
					$statement->execute();
				}
        }


    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
    

?>