<?php include 'includes/header.php'; ?>
<?php
	$id = $_GET['id'];

	//Create DB Object
	$db = new Database();

	//Create Query
	$query = "SELECT * FROM post WHERE id = ".$id;
	//Run Query
	$post = $db->select($query)->fetch_assoc();

	//Create Query
	$query = "SELECT * FROM categories";
	//Run Query
	$categories = $db->select($query);
?>
<div class="blog-post">
            <h2 class="blog-post-title"><?php echo $post['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($post['date']); ?> by <a href="#">
		<?php
			$aquery = "SELECT username FROM author WHERE id = '".$post['author_id']."' LIMIT 1";
			$users = $db->select($aquery);
			while($user = $users->fetch_assoc()) :
				 echo $user['username'];
			 endwhile;
			 ?></a></p>
				<?php echo $post['body']; ?>
          </div><!-- /.blog-post -->
<?php include 'includes/footer.php'; ?>
