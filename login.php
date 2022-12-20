<?php  include('connect.php'); ?>
<?php  include('functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Averia+Serif+Libre|Noto+Serif|Tangerine" rel="stylesheet">
	<!-- Styling for public area -->
	<link rel="stylesheet" href="css/style.css">
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
<div class="container">
<div class="navbar">
			<div class="brand">
				<a href="index.php"><h1>MyBlog</h1></a>
			</div>
			<ul>
			  <li><a href="index.php">Home</a></li>
			  <li><a href="about.php">About</a></li>
              <li><a class="active" href="login.php">Login</a></li>			  			  
			</ul>
		</div>

	<div style="width: 40%; margin: 20px auto;">
		<form method="post" action="login.php" >
			<h2>Login</h2>
			<?php if (count($errors) > 0) : ?>
  				<div class="message error validation_errors" >
  					<?php foreach ($errors as $error) : ?>
  	  				<p><?php echo $error ?></p>
  					<?php endforeach ?>
  				</div>
			<?php endif ?>
			<input type="text" name="username" value="<?php echo $username; ?>" value="" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<button type="submit" class="btn" name="login_btn">Login</button>
			<p>
				Not yet a member? <a href="register.php">Register</a>
			</p>
		</form>
	</div>
</div>
<div class="footer">
			<p>MyBlog &copy; 2022</p>
		</div>
	</div>
</body>
</html>