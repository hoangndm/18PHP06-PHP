<?php include 'common/header.php' ?>

  <!-- =============================================== -->

  <?php include 'sidebar.php';?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <a href="add_product.php"> List user</a>
  <?php include 'connect_db.php';?>
  <?php 
    $sql = "SELECT * FROM users";
    $listUser = mysqli_query($conn, $sql);
  ?>
  <h1>Product list</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Password</th>
      <th>Sex</th>
      <th>City</th>
    </tr>
    <?php if ($listUser->num_rows > 0){?>
    <?php while($user = $listUser->fetch_assoc()) {
      ?>
        <tr>
          <td><?php echo $user['id']; ?></td>
          <td><?php echo $user['name']; ?></td>
          <td><?php echo $user['email']; ?></td>
          <td><?php echo $user['password']?></td>
          <td><?php echo $user['sex']; ?></td>
          <td><?php echo $user['city']; ?></td>
          <td>
            <a href="edit_user.php?idEdit=<?php echo $user['id']?>">EDIT</a> 
            <a href="deleteUser.php?id=<?php echo $user['id']?>">DELETE</a> 

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
