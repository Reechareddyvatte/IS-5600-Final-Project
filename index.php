<?php require_once('connect.php') ?>
<?php require_once('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Averia+Serif+Libre|Noto+Serif|Tangerine" rel="stylesheet">
	<!-- Styling for public area -->
	<link rel="stylesheet" href="css/style.css">
	<meta charset="UTF-8">
	<title>MyBlog</title>
</head>
<body>
	<!-- container - wraps whole page -->
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
        <?php if (isset($_SESSION['user']['username'])) { ?>
	<div class="logged_in_info">
		<span>Welcome <?php echo $_SESSION['user']['username'] ?></span>
		|
		<span><a href="logout.php">logout</a></span>
	</div>
    <?php }else{ ?>
    <div class="banner">
	<div class="welcome_msg">
		<h1>The Number One Source</h1>
		<p> 
		    Interact with experts <br> 
		    from all around the world. <br> 
		    Share and find information on Various topics. <br>			
		</p>
		<a href="register.php" class="btn">Join our Community</a>
	</div>
	<div class="login_div">
		<form action="login.php" method="post" >
			<h2>Login</h2>
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password"  placeholder="Password"> 
			<button class="btn" type="submit" name="login_btn">Login</button>
		</form>
	</div>
</div>
<?php } ?>
		<!-- Page content -->
		<div class="content">
			<h2 class="content-title">Available Articles</h2>
			<hr>
			<?php $articles = getArticles(); ?>
            <?php foreach ($articles as $art): ?>
	<div class="post" style="margin-left: 0px;">
		<img src="<?php echo 'images/' . $art['image']; ?>" class="post_image" alt="">
        <?php if (isset($art['topic']['name'])): ?>
			<a 
				href="<?php echo 'articleby_topic.php?topic=' . $art['topic']['id'] ?>"
				class="btn category">
				<?php echo $art['topic']['name'] ?>
			</a>
		<?php endif ?>
		<a href="single_article.php?post-slug=<?php echo $art['holder']; ?>">
			<div class="post_info">
				<h3><?php echo $art['title'] ?></h3>
				<div class="info">
					<span><?php echo date("F j, Y ", strtotime($art["created_at"])); ?></span>
					<span class="read_more">Details</span>
				</div>
			</div>
		</a>
	</div>
<?php endforeach ?>
		</div>
		<div class="footer">
			<p>MyBlog &copy; 2022</p>
		</div>
	</div>
</body>
</html>