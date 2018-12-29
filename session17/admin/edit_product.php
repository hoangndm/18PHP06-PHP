<?php include 'common/header.php' ?>

  <!-- =============================================== -->

  <?php include 'sidebar.php';?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <?php include 'connect_db.php';?>
  <!-- include, include_once, require, require_once; -->
  <?php
     $id = $_GET['idEdit'];
     $sql = "SELECT * FROM product WHERE id = $id";
     $oldProductEdit = mysqli_query($conn, $sql);
     $oldProduct = $oldProductEdit->fetch_assoc();
     $name        = $oldProduct['name'];
     $description = $oldProduct['description'];
     $price       = $oldProduct['price'];
     $status      = $oldProduct['status'];
     $imageName   = $oldProduct['image'];
     if (isset($_POST['edit_product'])) {
       $name        = $_POST['name'];
       $description = $_POST['description'];
       $price       = $_POST['price'];
       $status      = $_POST['status'];
       if (!$_FILES['image']['error']) {
         // xu ly upload anh
         $image = $_FILES['image'];
         $imageName   = uniqid().'_'.$image['name'];
         $targetUpload = 'uploads/'.$imageName;
         move_uploaded_file($image['tmp_name'], $targetUpload);
       // ket thuc xu ly upload anh
       }
       $sql = "UPDATE products SET name = '$name', description = '$description', price = $price, status = $status, image = '$imageName' WHERE id = $id";
       if (mysqli_query($conn, $sql) === TRUE) {
         header("Location: list_product.php");
       }
     }
  ?>
  <h1> edit product</h1>
  <form action="#" method="POST" enctype="multipart/form-data">
    <p>Product name: <input type="text" name="name" placeholder="Please input product name" value="<?php echo $name?>"></p>
    <p>Product description: <textarea name="description" rows="10" cols="30"><?php echo $description?></textarea></p>
    <p>Product price: <input type="text" name="price" placeholder="Please input product price" value="<?php echo $price?>"></p>
    <p>Product image: <input type="file" name="image"></p>
    <img src="uploads/<?php echo $imageName?>">
    <p>Status:
      <input type="radio" name="status" value="1" <?php echo $status == 1?"checked":"";?>> Yes
      <input type="radio" name="status" value="0"<?php echo $status == 0?"checked":"";?>> No
    </p>
    <p><input type="submit" name="edit_product" value="Edit product"></p>
  </form>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>
</body>
</html>
