<?php include 'includes/header.php'; ?>
<?php
    //Create DB Object
    $db = new Database();

    //Create query
    $query = "SELECT * FROM post";

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
            <a class="readmore" href="post.php?id=<?php echo urlencode($row['id']); ?>">Read More</a>
          </div><!-- /.blog-post -->
      <?php endwhile; ?>

          <nav>
            <ul class="pager">
              <li><a href="#">Previous</a></li>
              <li><a href="#">Next</a></li>
            </ul>
          </nav>
<?php else : ?>
    <p> There are no posts yet</p>
<?php endif; ?>

        <?php include 'includes/footer.php'; ?>
