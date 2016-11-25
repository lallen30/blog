<?php include 'config/config.php'; ?>
<?php include 'libraries/Database.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'helpers/format_helper.php'; ?>
<?php
    //Create DB Object
    $db = new Database();

    //Create query
    $query = "SELECT * FROM post WHERE id = '".$_GET['id']."' LIMIT 1";
//    $query = "SELECT * FROM post";

    //Run query
    $posts = $db->select($query);
 ?>
 <?php if($posts) : ?>
     <?php while($row = $posts->fetch_assoc()) : ?>


          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> <a href="#">
                <?php
                $aquery = "SELECT username FROM author WHERE id = '".$row['author_id']."' LIMIT 1";
                $users = $db->select($aquery);
                while($user = $users->fetch_assoc()) :
                     echo $user['username'];
                 endwhile;
                 ?>
             </a></p>
            <?php echo shortenText($row['body']); ?>
            <a class="readmore" href="post.php?=<?php echo $row['id']; ?>">Read More</a>
          </div><!-- /.blog-post -->
      <?php endwhile; ?>

<?php else : ?>
    <p> This post does not exist.</p>
<?php endif; ?>

        <?php include 'includes/footer.php'; ?>
