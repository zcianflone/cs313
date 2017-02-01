
<html>
 <title>Pantry</title>
  <meta charset="utf-8">

<head></head>

<body>
<?php

try
{

$dbUrl = getenv('DATABASE_URL');

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}

catch (PDOException $ex)
{
	echo 'Error!: ' . ex->getMessage();
	die();
}

foreach ($db->query('SELECT name FROM item') as $row)
{
	echo 'item name:'. $row['name'];
	echo '<br/>';
}
?>

</body>

</html>