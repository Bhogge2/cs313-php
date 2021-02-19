<?php
session_start();

$badLogin = false;

// First check to see if we have post variables, if not, just
// continue on as always.

if (isset($_POST['txtUser']) && isset($_POST['txtPassword'])) {
	// they have submitted a username and password for us to check
	$username = $_POST['txtUser'];
	$password = $_POST['txtPassword'];

	// Connect to the DB
	require("dbAccess.php");
	$db = get_db();

	$query = 'SELECT password FROM users WHERE username=:username';

	$statement = $db->prepare($query);
	$statement->bindValue(':username', $username);

	$result = $statement->execute();

	if ($result) {
		$row = $statement->fetch();
		$hashedPasswordFromDB = $row['password'];

		// now check to see if the hashed password matches
		if (password_verify($password, $hashedPasswordFromDB)) {
			// password was correct, put the user on the session, and redirect to home
			$_SESSION['username'] = $username;
			header("Location: index.php");
			die(); // we always include a die after redirects.
		} else {
			$badLogin = true;
		}
	} else {
		$badLogin = true;
	}
}

// If we get to this point without having redirected, then it means they
// should just see the login form.
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<title>Sign In</title>
</head>

<body>
	<?php include 'navbar.php'; ?>
	<div class="container big-container">

		<?php
		if ($badLogin) {
			echo "Incorrect username or password!<br /><br />\n";
		}
		?>

		<h1>Please sign in below:</h1>

		<form id="mainForm" action="signIn.php" method="POST">

			<div class="form-group">
			<label for="txtUser">Username</label>
				<input type="text" id="txtUser" name="txtUser" placeholder="Username" class="form-control small-input">
			</div>

			<div class="form-group">
				<label for="txtPassword">Password</label>
				<input type="password" id="txtPassword" name="txtPassword" placeholder="Password" class="form-control small-input">
			</div>

			<input type="submit" value="Sign In" class="btn btn-primary" />

		</form>

		<br /><br />

		Or <a href="signUp.php">Sign up</a> for a new account.

	</div>

</body>

</html>