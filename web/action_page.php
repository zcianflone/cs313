
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

echo "quantity: " $quantity;
		echo '<br/>';

?>

</body>

</html>

