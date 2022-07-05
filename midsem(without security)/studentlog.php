<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/gif/png" href="logo.png">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="tutssty.css">
</head>
<body>
	<div class="header">
		<h2>Student Login</h2>
	</div>
	<form method="post" action="allready.php">
		<div class="input-g">
			<label>Register Number:</label>
			<input type="text" name="reg" required>
		</div>
		<div class="input-g">
			<label>Password</label>
			<input type="password" name="Password" required>
		</div>
		<div class="input-g">
			<button type="submit" name="login" class="btn">Login</button>
		</div>
		<p>
			 <a style="float: right;" href="mainpage.html">Home</a>
		</p>
	</form>
</body>
</html>