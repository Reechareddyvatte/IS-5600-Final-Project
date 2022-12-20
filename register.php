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
<title>Join Now</title>
</head>
<body>
<div class="container">
<div class="navbar">
			<div class="brand">
				<a href="index.php"><h1>MyBlog</h1></a>
			</div>
			<ul>
              <li><a class="active" href="index.php">Home</a></li>
			  <li><a href="about.php">About</a></li>
              <li><a href="login.php">Login</a></li>		
			</ul>
		</div>
	<div style="width: 40%; margin: 20px auto;">
		<form method="post" action="register.php" >
			<h2>Register Now</h2>
			<?php if (count($errors) > 0) : ?>
  				<div class="message error validation_errors" >
  					<?php foreach ($errors as $error) : ?>
  	  				<p><?php echo $error ?></p>
  					<?php endforeach ?>
  				</div>
			<?php endif ?>
			<input  type="text" name="username" value="<?php echo $username; ?>"  placeholder="Username">
			<input type="email" name="email" value="<?php echo $email ?>" placeholder="Email">
			<input type="password" name="password_1" placeholder="Password">
			<input type="password" name="password_2" placeholder="Password confirmation">
			<button type="submit" class="btn" name="reg_user">Register</button>
			<p>
				Already a member? <a href="login.php">Login</a>
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