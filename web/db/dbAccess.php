<?php

try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  foreach ($db->query('SELECT * FROM pokemon') as $row)
{
  echo 'Pokemon: ' . $row['pokemon_name'];
  echo ' Type: ' . $row['pokemon_type'];
  echo '<br/>';
}
}

catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}



?>