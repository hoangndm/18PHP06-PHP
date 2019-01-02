<?php include 'common/header.php'?>
  <?php include 'sidebar.php';?>
  <div class="content-wrapper">
  <?php 
    include 'connect_db.php';
    if (isset($_POST['add_product'])) {
      $name        = $_POST['name'];
      $description = $_POST['description'];
      $price       = $_POST['price'];
      $status      = $_POST['status'];
      $image       = $_FILES['image'] ;
      $imageName   = uniqid().'_'.$image['name'];
      // xu ly upload anh
      $targetUpload = 'uploads/imageProduct/'.$imageName;
      move_uploaded_file($image['tmp_name'], $targetUpload);
      // ket thuc xu ly upload anh
      $sql = "INSERT INTO product (name, description, price, image, status) VALUES ('$name', '$description', '$price', '$imageName', '$status')";
      if (mysqli_query($conn, $sql) === TRUE) {
        header("Location: list_product.php");
      }
    }
  ?>
  <h1>Add product</h1>
  <form action="#" method="POST" enctype="multipart/form-data">
    <p>Product name: <input type="text" name="name" placeholder="Please input product name"></p>
    <p>Product description: <textarea name="description" rows="10" cols="30"></textarea></p>
    <p>Product price: <input type="text" name="price" placeholder="Please input product price"></p>
    <p>Product image: <input type="file" name="image"></p>
    <p>Status:
      <input type="radio" name="status" value="1" checked> Yes
      <input type="radio" name="status" value="0"> No
    </p>
    <p><input type="submit" name="add_product" value="Add product"></p>
  </form>
  </div>
  <!-- /.content-wrapper -->

  <?php include 'common/footer.php' ?>;