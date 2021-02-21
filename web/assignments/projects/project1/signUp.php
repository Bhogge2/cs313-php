<?php
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<title>Sign Up</title>
</head>

<body class="text-center">
	<?php include 'navbar.php'; ?>
	<div class="container big-container">

		<form id="mainForm" class="form-signin" action="createAccount.php" method="POST">
			<h1 class="h3 mb-3 font-weight-normal">Sign up for a new account</h1>

			<label for="inputUsername" class="sr-only">Username</label>
			<input type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus>

			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>

			<label for="inputPassword2" class="sr-only">Confirm Your Password</label>
			<input type="password" id="inputPassword2" class="form-control" placeholder="Confirm Your Password" style="margin-bottom: 10px;" required>

			<button class="btn btn-lg btn-primary btn-block" type="submit">Create Account</button>

			Already have an account? <a href="signIn.php">Sign in here.</a>
		</form>


	</div>

</body>

</html>