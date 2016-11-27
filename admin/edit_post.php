<?php include 'includes/header.php'; ?>
<?php
	$id = $_GET['id'];
	//Create DB Object
	$db = new Database();

    if(isset($_POST['submit'])){
        //Assign Var
        $title = mysqli_real_escape_string($db->link, $_POST['title']);
        $body = mysqli_real_escape_string($db->link, $_POST['body']);
        $category = mysqli_real_escape_string($db->link, $_POST['category']);
        $author = mysqli_real_escape_string($db->link, $_POST['author']);
        $tags = mysqli_real_escape_string($db->link, $_POST['tags']);
        //Simple Validation
        if($title == '' | $body == '' | $category == '' | $author == ''){
            //Set Error
            $error = 'Please fill out all required fields';
        }else{
          $query = "UPDATE post SET
                       title = '$title',
                       body = '$body',
                       category = '$category',
                       author_id = '$author',
                       tags = '$tags'
                       WHERE id = $id";
             $update_row = $db->update($query);
        }
    }

        if(isset($_POST['delete'])){
            $query = "DELETE FROM post WHERE id = ".$id;
            $delete_row = $db->delete($query);

        }

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
<?php

 ?>
<form method="post" action="edit_post.php?id=<?php echo $id; ?>">
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
          <option  value="<?php echo $row['id']; ?>" <?php echo $selected; ?>><?php echo $row['name']; ?></option>
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
            <option  value="<?php echo $row['id']; ?>" <?php echo $selected; ?>><?php echo $row['username']; ?></option>
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
  <input name="delete" type="submit" class="btn btn-danger" value="Delete" />
 </div>
 <br>
</form>

<?php include 'includes/footer.php'; ?>
