<?php include 'common/header.php' ?>

  <!-- =============================================== -->

  <?php include 'sidebar.php';?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <a href="add_product.php"> ADD PRODUCT</a>
  <?php include 'connect_db.php';?>
  <?php 
    $sql = "SELECT * FROM product";
    $listProducts = mysqli_query($conn, $sql);
  ?>
  <h1>Product list</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Image</th>
      <th>Price</th>
      <th>Status</th>
      <th>Created</th>
      <th>Action</th>
    </tr>
    <?php if ($listProducts->num_rows > 0){?>
    <?php while($product = $listProducts->fetch_assoc()) {
      $image = $product['image'];
      ?>
        <tr>
          <td><?php echo $product['id']; ?></td>
          <td><?php echo $product['name']; ?></td>
          <td><img src="<?php echo 'uploads/'.$image; ?>"></td>
          <td><?php echo $product['price']; ?></td>
          <td><?php echo $product['status']?"Con hang":"Het hang"; ?></td>
          <td><?php echo $product['time']; ?></td>
          <td>
            <a href="edit_product.php?idEdit=<?php echo $product['id']?>">EDIT</a> 
            | <a href="delete_product.php?id=<?php echo $product['id']?>">DELETE</a> 

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
