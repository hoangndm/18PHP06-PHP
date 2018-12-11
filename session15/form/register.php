<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
function connectDataBase(){
    $server = "localhost";
    $username = "register";
    $password = "123123";
    $dbname = "18php06_register";
    $conn = mysqli_connect( $server, $username, $password, $dbname );
    if(!$conn) {
        die("khong ket noi :". $conn -> connect_error());
    }
    return $conn;
}
?>
<?php

    $errname = $errusername = $errpassword  = '';
    $name =  $username = $password =$gender=$country = '';
   if(isset($_POST['register'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    if($name==''){
        $errname= 'please input your name';
    }

    if($username==''){
        $errusername= 'please input your username';
    }
    if($password==''){
        $errpassword= 'please input your password';
    }
    if($country==''){
        $errpassword= 'please input your country';
    }
    if($gender==''){
        $errpassword= 'please input your gender';
    }

    else {
        $conn = connectDataBase();
        $sql = "INSERT INTO user (name, username, password,country, gender)
    VALUES ('$name','$username', '$password', '$country','$gender')";

        if ($conn->query($sql) === TRUE) {
        echo "Thanh cong";

    }   else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
    }

?>
    <form action="#" method ="POST">
        <p>name</p>
        <input type="text" name="name" value="<?php echo $name ?>" >
        <span><?php echo $errname ?> </span>
        <p>username</p>
        <input type="text" name="username"  value="<?php echo $username ?>" >
        <span><?php echo $errusername ?> </span>
        <p>password</p>
        <input type="password" name="password"  value="<?php echo $password ?>" >
        <span><?php echo $errpassword ?> </span>
        <br>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
        <br>
        <select name="country" value="<?php echo $country ?>">
            <option value="">choose city</option>
            <option <?php if($country == 'Da Nang')  echo "selected";?>  value="Da Nang">Da Nang</option>
            <option  <?php if ($country == 'Ha Noi')  echo "selected";?> value="Ha Noi">Ha Noi</option>
            <option  <?php if($country == 'Ho Chi Minh')  echo "selected";?> value="Ho Chi Minh">HCM</option>
        </select>
        <br>
        <input type="submit" name="register">
    </form>
</body>
</html>
