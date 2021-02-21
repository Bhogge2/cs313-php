<?php
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<script src='createAccount.js'></script>
	<title>Sign Up</title>
</head>

<body class="text-center">
	<?php include 'navbar.php'; ?>
	<div class="container big-container">

		<form id="mainForm" class="form-signin" style="margin-top: 50px;">
			<h1 class="h4 mb-4 font-weight-normal">Sign up for a new account</h1>

			<label for="username" class="sr-only">Username</label>
			<input type="text" id="username" class="form-control" placeholder="Username" required autofocus>

			<label for="password" class="sr-only">Password</label>
			<input type="password" id="password" class="form-control" placeholder="Password" style="margin-bottom: 10px;" required>

			<label for="password2" class="sr-only">Confirm Password</label>
			<input type="password" id="password2" class="form-control" placeholder="Confirm Your Password" style="margin-bottom: 10px;" required>

			<input class="btn btn-lg btn-primary btn-block" type="button" onclick="createAccountChecks()" value="Create Account" />

			Already have an account? <a href="signIn.php">Sign in here.</a>
		</form>


	</div>

</body>

</html>