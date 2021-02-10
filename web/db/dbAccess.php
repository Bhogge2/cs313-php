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
  $statement = $db->prepare('SELECT * FROM pokemon');
        $statement->execute();

        // Go through each result
        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
            echo $row['pokemon_id'];
        }
}

catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}



?>