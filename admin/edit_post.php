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

    	//Create Query
    	$query = "SELECT * FROM author";
    	//Run Query
    	$authors = $db->select($query);
?>
<form method="post" action="edit_post.php">
  <div class="form-group">
    <label for="title">Post Title</label>
    <input name="title" type="text" class="form-control" id="title" placeholder="Enter Title" value="<?php echo $post['title']; ?>">
  </div>
    <div class="form-group">
      <label for="body">Post body</label>
      <textarea name="body" type="text" class="form-control" id="body" placeholder="Enter Post Body"><?php echo $post['body']; ?></textarea>
    </div>
      <div class="form-group">
        <label for="category">Category</label>
        <select name="category" id="category" class="form-control">
        <?php while ($row = $categories->fetch_assoc()) : ?>
            <?php if($row['id'] == $post['category']){
                    $selected = 'selected';
                }else{
                    $selected = '';
                }
            ?>
          <option <?php echo $selected; ?>><?php echo $row['name']; ?></option>
        <?php endwhile; ?>
        </select>
      </div>

        <div class="form-group">
          <label for="author">Author</label>
          <select name="author" id="author" class="form-control">
          <?php while ($row = $authors->fetch_assoc()) : ?>
              <?php if($row['id'] == $post['author_id']){
                      $selected = 'selected';
                  }else{
                      $selected = '';
                  }
              ?>
            <option <?php echo $selected; ?>><?php echo $row['username']; ?></option>
          <?php endwhile; ?>
          </select>
        </div>

          <div class="form-group">
            <label for="tags">Tags</label>
            <input name="tags" type="text" class="form-control" id="tags" placeholder="Enter tags" value="<?php echo $post['tags']; ?>">
          </div>
<div>
 <input name="submit" type="submit" class="btn btn-default" value="Submit" />
 <a href="index.php" class="btn btn-default">Cancel</a>
  <input name="delet" type="submit" class="btn btn-danger" value="Delete" />
 </div>
 <br>
</form>

<?php include 'includes/footer.php'; ?>
