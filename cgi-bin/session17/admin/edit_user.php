<?php include 'common/header.php' ?>

  <!-- =============================================== -->

  <?php include 'sidebar.php';?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- include, include_once, require, require_once; -->
  <?php
    include 'connect_db.php';
    $id = $_GET['idEdit'];
    $sql = "SELECT * FROM users WHERE id = $id";
    $oldUserEdit = mysqli_query($conn, $sql);
    $oldUser     = $oldUserEdit->fetch_assoc();
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
        header("Location: listUser.php");
      }
    ?>
  <h1> edit user</h1>
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
                  <input type="password" class="form-control" value="" name="password" placeholder="Password">
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
                      <option value=""></option>
                      <option <?php if($city == 'Da Nang')  echo "selected";?>  value ="Da Nang">Da Nang</option>
                      <option <?php if($city == 'Ha Noi')  echo "selected";?>  value ="Ha Noi">Ha Noi</option>
                      <option <?php if($city == 'Ho Chi Minh')  echo "selected";?>  value ="Ho Chi Minh">Ho Chi Minh</option>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" value="edit_user" name="edit_user" class="btn btn-primary">Edit User</button>
              </div>
            </form>
  </div>
  <!-- /.content-wrapper -->

    <?php include 'common/footer.php' ?>;