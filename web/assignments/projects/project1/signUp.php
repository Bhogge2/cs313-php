<?php
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<title>Sign Up</title>
</head>

<body>
	<?php include 'navbar.php'; ?>
	<div class="container big-container">

		<h1>Sign up for new account</h1>

		<form id="mainForm" action="createAccount.php" method="POST">

			<div class="form-group">
				<label for="txtUser">Username</label>
				<input type="text" id="txtUser" name="txtUser" placeholder="Username" class="form-control small-input">
			</div>

			<div class="form-group">
				<label for="txtPassword">Password</label>
				<input type="password" id="txtPassword" name="txtPassword" placeholder="Password" class="form-control small-input">
			</div>

			<input type="submit" value="Create Account" class="btn btn-primary" />

		</form>


	</div>

</body>

</html>