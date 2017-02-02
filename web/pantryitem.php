<html>
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

$itemName = str_replace('_',' ', $_GET['itemName']);

$stmt = $db->prepare('SELECT * FROM item WHERE name=:name');
$stmt->bindValue(':name', $itemName, PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo"<p>Item Details:</p>";
foreach ($rows as $row)
{
	echo "Name: " . $row["name"];
	echo "<br>";
	echo "Quantity: " . $row["quantity"];
	echo "<br>";
	echo "Expiration Date: " . $row["expdate"];
	echo "<br>";
}

echo "<p> Proof of Concept.  I'm trying to build this functionality into the main page with AJAX, but I'm not quite there yet. 
I don't want to commit to building this page out unless I can't the AJAX to work</p>";

?>

</body>
</html>