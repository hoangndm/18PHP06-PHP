<?php include 'common/header.php' ?>

  <!-- =============================================== -->

  <?php include 'sidebar.php';?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add user</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
            include 'connect_db.php';
            if (isset($_POST['add_user'])) {
              $name        = $_POST['name'];
              $email       = $_POST['email'];
              $password    = $_POST['password'];
              $sex         = $_POST['sex'];
              $city        = $_POST['city'];
              $sql = "INSERT INTO users (name, email, password, sex, city) VALUES ('$name', '$email', '$password', '$sex', '$city')";
              if (mysqli_query($conn, $sql) === TRUE) {
                header("Location: listUser.php");
              }
            }
            ?>
            <form role="form" action="#" method="POST">
              <div class="box-body">
              <div class="form-group">
                  <label>name</label>
                  <input type="name" class="form-control" name="name" placeholder="name">
                </div>
                <div class="form-group">
                  <label>Email address</label>
                  <input type="email" class="form-control" name="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label >Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                  <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="sex" value="0" checked>
                      Male
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="sex" value="1">
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
          <!-- /.box -->



          <?php include 'common/footer.php' ?>;