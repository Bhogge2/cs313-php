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
	<div class="container">

		<h1>Sign up for new account</h1>

		<form id="mainForm" action="createAccount.php" method="POST">

			<input type="text" id="txtUser" name="txtUser" placeholder="Username">
			<label for="txtUser">Username</label>
			<br /><br />

			<input type="password" id="txtPassword" name="txtPassword" placeholder="Password"></input>
			<label for="txtPassword">Password</label>
			<br /><br />

			<input type="submit" value="Create Account" />

		</form>


	</div>

</body>

</html>