<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Login</title>
		<link rel="stylesheet" href="css/login.css" />
	</head>
	<body>
		<div class="error"></div>
		<main>
			<div class="form-container">
				<form action="php/login_action.php" method="post" id="loginForm">
					<input
						type="text"
						name="username"
						id="username"
						class="input textBox"
						placeholder="Enter Username"
					/>
					<input
						type="password"
						name="password"
						id="password"
						class="input textBox"
						placeholder="Enter Password"
					/>
					<input type="submit" value="Login" class="button input" />
				</form>
			</div>
		</main>
		<script src="js/login.js"></script>
	</body>
</html>
