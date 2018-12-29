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
    $sql = "SELECT * FROM user WHERE id = $id";
    $oldUserEdit = mysqli_query($conn, $sql);
    $oldUser  = $oldUserEdit->fetch_assoc();
    $name        = $oldUser['name'];
    $email       = $oldUser['email'];
    $password    = $oldUser['password'];
    $sex      = $oldUser['sex'];
    $city   = $oldUser['city'];
    if (isset($_POST['edit_user'])) {
      $name        = $_POST['name'];
      $email       = $_POST['email'];
      $password    = $_POST['password'];
      $sex         = $_POST['sex'];
      $city        = $_POST['city'];
      }
      $sql = "UPDATE users SET name = '$name', email = '$email', password = $password, sex = $sex, city = '$city' WHERE id = $id";
      if (mysqli_query($conn, $sql) === TRUE) {
        header("Location: list_product.php");
      }
    ?>
  <h1> edit product</h1>
  <form role="form" action="#" method="POST">
              <div class="box-body">
              <div class="form-group">
                  <label>name</label>
                  <input type="name" class="form-control" name="name" value="<?php echo $name?>" placeholder="name">
                </div>
                <div class="form-group">
                  <label>Email address</label>
                  <input type="email" class="form-control" name="email" value="<?php echo $email?>"  placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label >Password</label>
                  <input type="password" class="form-control" value="<?php echo $password?>" name="password" placeholder="Password">
                </div>
                  <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="sex" value="0" <?php echo $sex == 0?"checked":"";?>>
                      Male
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="sex" value="1"<?php echo $sex == 1?"checked":"";?>>
                      Female
                    </label>
                  </div>
                </div>
                  <div class="form-group">
                  <label>Select</label>
                  <select class="form-control" name="city">
                    <option value ="Da Nang">Da Nang</option>
                    <option value ="Ha Noi">Ha Noi</option>
                    <option value ="Ho Chi Minh">Ho Chi Minh</option>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" value="add_user" name="add_user" class="btn btn-primary">Add User</button>
              </div>
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
