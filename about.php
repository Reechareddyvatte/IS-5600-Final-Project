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
              <li><a href="index.php">Home</a></li>
			  <li><a class="active" href="about.php">About</a></li>
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
			<h2 class="content-title">About</h2>
			<hr>
            <p style="font-family: cursive;font-size:20px;">A blog, short for weblog, is a frequently updated web page used for personal commentary or business content. Blogs are often interactive and include sections at the bottom of individual blog posts where readers can leave comments.
            Most are written in a conversational style to reflect the voice and personal views of the blogger. Some businesses use blogs to connect with target audiences and sell products.
            Blogs were originally called weblogs, which were websites that consisted of a series of entries arranged in reverse chronological order, so the newest posts appeared at the top. They were frequently updated with new information about various topics.
            </p>
            <br>
            <p style="font-family: cursive;font-size:20px;">Today's blogs are more likely to be a personal online journal or commentary related to a business that's frequently updated and intended for general public consumption. Blogs are still often defined by their format, consisting of a series of entries posted to a single page in reverse chronological order. Many blogs are collaborative and include multiple authors often writing on a single theme such as Engadget, a tech blog with multiple authors.
            A blog is usually devoted to a subject of interest to a target audience -- such as fashion, politics or information technology. Blogs can be thought of as providing ongoing commentary on a theme. They're intended to engage with a community interested in a topic and the personality or products of the blogger or sponsoring business. Bloggers often pick unique domain names that reflect the topic at hand, such as Not Another Cooking Show, a food blog.
            Bloggers control their content and don't have to rely on other outlets to publish their views and connect with an audience. Monetization strategies let bloggers make money from their writing and sometimes build entire careers.</p>
		</div>
		<div class="footer">
			<p>MyBlog &copy; 2022</p>
		</div>
	</div>
</body>
</html>