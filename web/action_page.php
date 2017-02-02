
<html>
 <title>Pantry Action</title>
  <meta charset="utf-8">

<head></head>

<body>
<?php

$dbUrl = getenv('DATABASE_URL');

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

echo "item: " . $_POST["desireditem"];
echo '<br/>';

$quantity = 0;

foreach ($db->query('SELECT name, quantity FROM item') as $row)
{
	if ($row["name"] == $_POST["desireditem"]){
		$quantity = $row["quantity"];
		
	}
	
}

echo"<p>Search Results:</p>";

echo "quantity: " . $quantity;
		echo '<br/>';
		
echo "<p> Proof of Concept.  I'm trying to build this functionality into the main page with AJAX, but I'm not quite there yet. 
I don't want to commit to building this page out unless I can't the AJAX to work/p>";

?>

</body>

</html>

