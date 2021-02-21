<?php
session_start();

$badLogin = false;

// First check to see if we have post variables, if not, just
// continue on as always.

if (isset($_POST['username']) && isset($_POST['password'])) {
	// they have submitted a username and password for us to check
	$username = $_POST['username'];
	$password = $_POST['password'];

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

		if (password_verify($password, $hashedPasswordFromDB)) {
			$_SESSION['username'] = $username;

			$query2 = 'SELECT user_id FROM users WHERE username=:username';

			$statement2 = $db->prepare($query2);
			$statement2->bindValue(':username', $username);

			$result2 = $statement2->execute();

			$row2 = $statement2->fetch();
			$user_id = $row['user_id'];

			$_SESSION['user_id'] = $user_id;

			header("Location: index.php");
			die();
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

<body class="text-center">
	<?php include 'navbar.php'; ?>
	<div class="container big-container">

		<?php
		if ($badLogin) {
			echo "Incorrect username or password!<br /><br />\n";
		}
		?>

		<form id="mainForm" class="form-signin" action="signIn.php" method="POST" style="margin-top: 50px;">
			<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
			<label for="inputUsername" class="sr-only">Username</label>
			<input type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
			<div class="checkbox mb-3">
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

			Or <a href="signUp.php">Sign up</a> for a new account.
		</form>

	</div>

</body>

</html>