<?php  include('connect.php'); ?>
<?php  include('functions.php'); ?>
<?php 
	if (isset($_GET['post-slug'])) {
		$post = getArticle($_GET['post-slug']);
	}
	$topics = getTopics();
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Averia+Serif+Libre|Noto+Serif|Tangerine" rel="stylesheet">
	<!-- Styling for public area -->
	<link rel="stylesheet" href="css/style.css">
	<meta charset="UTF-8">
<title> <?php echo $post['title'] ?> | MyBlog</title>
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
	
	<div class="content" >
		<!-- Page wrapper -->
		<div class="post-wrapper">
			<!-- full post div -->
			<div class="full-post-div">
			<?php if ($post['published'] == false): ?>
				<h2 class="post-title">Sorry... This post has not been published</h2>
			<?php else: ?>
				<h2 class="post-title"><?php echo $post['title']; ?></h2>
				<div class="post-body-div">
					<?php echo html_entity_decode($post['body']); ?>
				</div>
			<?php endif ?>
			</div>			
		</div>		
		<!-- post sidebar -->
		<div class="post-sidebar">
			<div class="card">
				<div class="card-header">
					<h2>Topics</h2>
				</div>
				<div class="card-content">
					<?php foreach ($topics as $topic): ?>
						<a 
							href="<?php echo 'articleby_topic.php?topic=' . $topic['id'] ?>">
							<?php echo $topic['name']; ?>
						</a> 
					<?php endforeach ?>
				</div>
			</div>
		</div>
		<!-- // post sidebar -->
	</div>
</div>
<div class="footer">
			<p>MyBlog &copy; 2022</p>
		</div>
	</div>
</body>
</html>