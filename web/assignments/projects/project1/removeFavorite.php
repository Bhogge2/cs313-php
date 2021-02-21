<?php
session_start();
// get the data from the POST
$pokemon_id = $_POST['pokemonId'];
$user_id = $_SESSION['user_id'];

require("dbAccess.php");
$db = get_db();

#check if the username already exists in the database
$stmt = $db->prepare('SELECT pokemon_id FROM user_favorites WHERE user_id=:userid');
$stmt->bindValue(':userid', $user_id, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = 'DELETE FROM user_favorites WHERE user_id=:userId AND pokemon_id=:pokemonId';
$statement = $db->prepare($query);
$statement->bindValue(':userId', $user_id);
$statement->bindValue(':pokemonId', $pokemon_id);

$statement->execute();

die(); 


?>