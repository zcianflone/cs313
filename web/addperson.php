<?php

	$dbUrl = getenv('DATABASE_URL');

	$dbopts = parse_url($dbUrl);

	$dbHost = $dbopts["host"];
	$dbPort = $dbopts["port"];
	$dbUser = $dbopts["user"];
	$dbPassword = $dbopts["pass"];
	$dbName = ltrim($dbopts["path"],'/');

	$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);


echo "done!";

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
            
            $sql = "INSERT INTO person(name, password) VALUES (" . $name . "," . $password . ")";
			$db->query($sql);

            echo "Name:" . $name . "Pass:" . $password;
        }


    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>