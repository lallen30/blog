<?php include 'includes/header.php'; ?>
<?php
    //Create DB oci_fetch_object
    $db = new Database;

    //Create query
    $query = "SELECT post.*, categories.name FROM post
                INNER JOIN categories
                ON post.category = categories.id";
    $posts = $db->select($query);

    //Create query
    $query = "SELECT * FROM categories";

    //Run query
    $categories = $db->select($query);
 ?>
<table class="table table-striped">
<tr>
    <th>Post ID#</th>
    <th>Post Title</th>
    <th>Category</th>
    <th>Author</th>
    <th>Date</th>
</tr>
<?php while($row = $posts->fetch_assoc()) : ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><a href="edit_post.php?id=<?php echo urlencode($row['id']); ?>"><?php echo $row['title']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php
    $aquery = "SELECT username FROM author WHERE id = '".$row['author_id']."' LIMIT 1";
    $users = $db->select($aquery);
    while($user = $users->fetch_assoc()) :
         echo $user['username'];
     endwhile;
     ?></td>
    <td><?php echo formatDate($row['date']); ?></td>

    </tr>
<?php endwhile; ?>
</table>

<table class="table table-striped">
<tr>
    <th>Category ID#</th>
    <th>Category Name</th>
</tr>

<?php while($row = $categories->fetch_assoc()) : ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><a href="edit_category.php?id=<?php echo urlencode($row['id']); ?>"><?php echo $row['name']; ?></td>
    </tr>
<?php endwhile; ?>
</table>
<?php include 'includes/footer.php'; ?>
