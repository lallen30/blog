<?php include 'includes/header.php'; ?>
<?php
	//Create DB Object
	$db = new Database();

    	//Create Query
    	$query = "SELECT * FROM categories";
    	//Run Query
    	$categories = $db->select($query);

    	//Create Query
    	$query = "SELECT * FROM author";
    	//Run Query
    	$authors = $db->select($query);
?>
<form method="post" action="add_post.php">
  <div class="form-group">
    <label for="title">Post Title</label>
    <input name="title" type="text" class="form-control" id="title" placeholder="Enter Title">
  </div>
    <div class="form-group">
      <label for="body">Post body</label>
      <textarea name="body" type="text" class="form-control" id="body" placeholder="Enter Post Body"></textarea>
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
            <input name="tags" type="text" class="form-control" id="tags" placeholder="Enter tags">
          </div>
<div>
 <button name="submit" type="submit" class="btn btn-default">Submit</button>
 <a href="index.php" class="btn btn-default">Cancel</a>
 </div>
 <br>
</form>

<?php include 'includes/footer.php'; ?>
