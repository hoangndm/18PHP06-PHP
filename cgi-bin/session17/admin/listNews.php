<?php include 'common/header.php' ?>

<!-- =============================================== -->

<?php include 'sidebar.php';?>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <a href="addNews.php"> ADD NEWS</a>
<?php include 'connect_db.php';?>
<?php 
$sql = "SELECT * FROM news";
$listNews = mysqli_query($conn, $sql);
?>
<h1>News list</h1>
<table>
<tr>
    <th>ID</th>
    <th>title</th>
    <th>Description</th>
    <th>content</th>
    <th>image</th>
    <th>Category</th>
</tr>
<?php if ($listNews->num_rows > 0){?>
<?php while($news = $listNews->fetch_assoc()) {
    $image = $news['image'];
    ?>
    <tr>
        <td><?php echo $news['id']; ?></td>
        <td><?php echo $news['title']; ?></td>
        <td><img src="<?php echo 'uploads/imageNews/'.$image; ?>"></td>
        <td><?php echo $news['description']; ?></td>
        <td><?php echo $news['content'] ?></td>
        <td><?php echo $news['categories']; ?></td>
        <td>
        <a href="editNews.php?idEdit=<?php echo $news['id']?>">EDIT</a> 
        | <a href="deleteNews.php?id=<?php echo $news['id']?>">DELETE</a> 

        </td>
    </tr>
<?php 
    }
    } else {?>
    <tr>
    <td colspan="7" style="text-align: center;">No product</td>
    </tr>
<?php }?>
</table>
</div>
<!-- /.content-wrapper -->

<?php include 'common/footer.php' ?>;