<?php include 'includes/header.php'; ?>
<?php
	$id = $_GET['id'];

	//Create DB Object
	$db = new Database();

	//Create Query
	$query = "SELECT * FROM categories WHERE id = ".$id;
	//Run Query
	$category = $db->select($query)->fetch_assoc();

    	//Create Query
    	$query = "SELECT * FROM categories";
    	//Run Query
    	$categories = $db->select($query);

    	//Create Query
    	$query = "SELECT * FROM author";
    	//Run Query
    	$authors = $db->select($query);
?>
<form method="post" action="edit_category.php">
  <div class="form-group">
    <label for="name">Category Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category" value="<?php echo $category['name'] ?>">
  </div>
  <div>
   <button name="submit" type="submit" class="btn btn-default">Submit</button>
   <a href="index.php" class="btn btn-default">Cancel</a>
    <input name="delet" type="submit" class="btn btn-danger" value="Delete" />
   </div>
   <br>
</form>


<?php include 'includes/footer.php'; ?>
