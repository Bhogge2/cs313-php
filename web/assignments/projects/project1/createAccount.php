<?php

// get the data from the POST
$username = $_POST['username'];
$password = $_POST['password'];

if (!isset($username) || $username == ""
	|| !isset($password) || $password == "")
{
	header("Location: signUp.php");
	die();
}

$username = htmlspecialchars($username);

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

require("dbAccess.php");
$db = get_db();

$query = 'INSERT INTO login(username, password) VALUES(:username, :password)';
$statement = $db->prepare($query);
$statement->bindValue(':username', $username);

$statement->bindValue(':password', $hashedPassword);

$statement->execute();

header("Location: signIn.php");
die();

?>