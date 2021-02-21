<?php

// get the data from the POST
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if (!isset($username) || $username == ""
	|| !isset($password) || $password == "")
{
	header("Location: signUp.php");
	die();
}
else if($password != $password2)
{
       header("Location: signUp.php");
	die();
}

$username = htmlspecialchars($username);

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

require("dbAccess.php");
$db = get_db();

$query = 'INSERT INTO users(username, password) VALUES(:username, :password1)';
$statement = $db->prepare($query);
$statement->bindValue(':username', $username);

$statement->bindValue(':password1', $hashedPassword);

$statement->execute();

header("Location: signIn.php");
die();

?>