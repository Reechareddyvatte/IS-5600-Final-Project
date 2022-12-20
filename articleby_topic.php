<?php include('connect.php'); ?>
<?php include('functions.php'); ?>
<?php 
	// Get posts under a particular topic
	if (isset($_GET['topic'])) {
		$topic_id = $_GET['topic'];
		$posts = getArticlesByTopic($topic_id);
	}
?>
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
<!-- content -->
<div class="content">
	<h2 class="content-title">
		Articles on <u><?php echo getTopicById($topic_id); ?></u>
	</h2>
	<hr>
	<?php foreach ($posts as $post): ?>
		<div class="post" style="margin-left: 0px;">
			<img src="<?php echo 'images/' . $post['image']; ?>" class="post_image" alt="">
			<a href="single_article.php?post-slug=<?php echo $post['holder']; ?>">
				<div class="post_info">
					<h3><?php echo $post['title'] ?></h3>
					<div class="info">
						<span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
						<span class="read_more">Read more...</span>
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