<?php include 'includes/header.php'; ?>
<?php
	//Create DB Object
	$db = new Database();

    if(isset($_POST['submit'])){
        //Assign Var
        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        //Simple Validation
        if($name == ''){
            //Set Error
            $error = 'Please fill in the Category name';
        }else{
           $query = "INSERT INTO categories (name)
             VALUES ('$name')";
             $insert_row = $db->insert($query);
        }
    }
?>
<form method="post" action="add_category.php">
  <div class="form-group">
    <label for="name">Category Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category">
  </div>
  <div>
   <button name="submit" type="submit" class="btn btn-default">Submit</button>
   <a href="index.php" class="btn btn-default">Cancel</a>
   </div>
   <br>
</form>


<?php include 'includes/footer.php'; ?>
