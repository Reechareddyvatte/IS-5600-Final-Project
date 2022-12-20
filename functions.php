<?php 
function getArticles() {
	global $conn;
	$sql = "SELECT * FROM articles WHERE published=true";
	$result = mysqli_query($conn, $sql);

	$articles = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final_articles = array();
    foreach ($articles as $articl) {
		$articl['topic'] = getTopic($articl['id']); 
		array_push($final_articles, $articl);
	}

	return $final_articles;
}

function getTopic($articlId){
    global $conn;
    $sql = "SELECT * FROM topics WHERE id=
			(SELECT topic_id FROM posts WHERE article_id=$articlId) LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic;

}

function getArticlesByTopic($topic_id) {
	global $conn;
	$sql = "SELECT * FROM articles 
			WHERE articles.id IN 
			(SELECT posts.article_id FROM posts 
				WHERE posts.topic_id=$topic_id GROUP BY posts.article_id
				HAVING COUNT(1) = 1)";
	$result = mysqli_query($conn, $sql);
	$articles = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_articles = array();
	foreach ($articles as $arts) {
		$arts['topic'] = getTopic($arts['id']); 
		array_push($final_articles, $arts);
	}
	return $final_articles;
}

function getTopicById($topicId){
	global $conn;
	$sql = "SELECT name FROM topics WHERE id=$topicId";
	$result = mysqli_query($conn, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic['name'];
}

function getArticle($holder){
	global $conn;
	$article_holder = $_GET['post-slug'];
	$sql = "SELECT * FROM articles WHERE holder='$article_holder' AND published=true";
	$result = mysqli_query($conn, $sql);

	$article = mysqli_fetch_assoc($result);
	if ($article) {		
		$article['topic'] = getTopic($article['id']);
	}
	return $article;
}

function getTopics()
{
	global $conn;
	$sql = "SELECT * FROM topics";
	$result = mysqli_query($conn, $sql);
	$topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $topics;
}


// REGISTER USER
$username = "";
$email    = "";
$errors = array(); 


if (isset($_POST['reg_user'])) {
    $username = format_input($_POST['username']);
    $email = format_input($_POST['email']);
    $pass = format_input($_POST['password_1']);
    $confirm_pass = format_input($_POST['password_2']);

    if (empty($username)) {  array_push($errors, "Enter username"); }
    if (empty($email)) { array_push($errors, "Enter email"); }
    if (empty($pass)) { array_push($errors, "Enter password"); }
    if ($pass != $confirm_pass) { array_push($errors, "Passwords do not match");}
    
    $check_user = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";

    $result = mysqli_query($conn, $check_user);
    $user = mysqli_fetch_assoc($result);
    if ($user) {
        if ($user['username'] === $username) {
          array_push($errors, "Username already exists");
        }
        if ($user['email'] === $email) {
          array_push($errors, "Email already exists");
        }
    }
    if (count($errors) == 0) {
        $query = "INSERT INTO users (username, email, password, created_at, updated_at) 
                  VALUES('$username', '$email', '$password', now(), now())";
        mysqli_query($conn, $query);        
        $user_id = mysqli_insert_id($conn); 
        // Create session and redirect user to homepage
        $_SESSION['user'] = getUser($user_id);
        $_SESSION['message'] = "You are now logged in";
        header('location: index.php');				        
    }
}

// LOGIN
if (isset($_POST['login_btn'])) {
    $username = format_input($_POST['username']);
    $password = format_input($_POST['password']);

    if (empty($username)) { array_push($errors, "Username required"); }
    if (empty($password)) { array_push($errors, "Password required"); }
    if (empty($errors)) {
        $sql = "SELECT * FROM users WHERE username='$username' and password='$password' LIMIT 1";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // get id of user
            $user_id = mysqli_fetch_assoc($result)['id']; 

            $_SESSION['user'] = getUser($user_id); 
            $_SESSION['message'] = "You are now logged in";                
            header('location: index.php');				                      
        } else {
            array_push($errors, 'Invalid username/password!');
        }
    }
}
// Format form inputs
function format_input(String $value){	
    global $conn;
    $val = trim($value);
    $val = mysqli_real_escape_string($conn, $value);
    return $val;
}

// Get user details
function getUser($id){
    global $conn;
    $sql = "SELECT * FROM users WHERE id=$id LIMIT 1";

    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    return $user; 
}
?>