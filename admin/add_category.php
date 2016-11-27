<?php include 'includes/header.php'; ?>

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
