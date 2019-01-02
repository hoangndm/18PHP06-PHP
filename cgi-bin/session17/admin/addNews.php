
<?php
include 'common/header.php';
include 'sidebar.php';
?>
<div class="content-wrapper">
<?php 
include 'connect_db.php';
if(isset($_POST['addNew'])){
    $title       = $_POST['title'];
    $description = $_POST['description'];
    $content     = $_POST['content'];
    $categories  = $_POST['categories'];
    $image       = $_FILES['image'];
    $imageName   = uniqid().'_'.$image['name'];
    // xu ly upload anh
    $targetUpload = 'uploads/imageNews/'.$imageName;
    move_uploaded_file($image['tmp_name'], $targetUpload);
    // ket thuc xu ly upload anh
    $sql = "INSERT INTO news (title, description,content,image,categories) VALUE ('$title', '$description', '$content', '$imageName', '$categories')";
    echo $sql;
    if(mysqli_query($conn, $sql)=== TRUE){
       header ("Location: listNews.php");
    }
}
?>
<h1>Add News</h1>
<form action="#" method="POST" enctype="multipart/form-data">
    <p>Title: <input type="text" name="title" placeholder="Please input title"></p>
    <p>Description: <input type="text" name="description" placeholder="Please input description "></p>
    <p>Content: <br> <textarea name="content" style=" margin: 30px;" rows="20" cols="150"></textarea></p>
    <p>image: <input type="file" name="image"></p>
    <div class="form-group">
    <?php 
    $sql = "SELECT * FROM categories";
    $listCategories = mysqli_query($conn, $sql);
    ?>
        <label>Category</label>
        <select class="form-control" name="categories">
        <?php if ($listCategories->num_rows > 0){?>
        <?php while($category = $listCategories->fetch_assoc()) {
        ?>
        <option value ="<?php echo $category['name']?>"><?php echo $category['name']?></option>
        <?php
        }
        }
        ?>
        </select>
        </div>
    <p><input type="submit" name="addNew" value="AddNews"></p>
</form>
</div>

<?php include 'common/footer.php' ?>;