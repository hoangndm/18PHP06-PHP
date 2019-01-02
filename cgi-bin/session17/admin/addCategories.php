
<?php
include 'common/header.php';
include 'sidebar.php';
?>
<div class="content-wrapper">
<?php 
include 'connect_db.php';
if(isset($_POST['addCategories'])){
    $name = $_POST['name'];
    $url = $_POST['url'];
    $sql = "INSERT INTO categories (name, url) VALUE ('$name', '$url')";
    if(mysqli_query($conn, $sql)=== TRUE){
        echo 'ok';
    }
}
?>
<h1>Add Category</h1>
<form action="#" method="POST" enctype="multipart/form-data">
    <p>Name: <input id="nameCategory" type="text" name="name" placeholder="Please input name"></p>
    <p>url: <input id ="urlCategory" type="text" name="url" readonly ></p>
    <p><input type="submit" name="addCategories" value="Add"></p>
</form>
</div>

<?php include 'common/footer.php' ?>;
<script src="https://cdnjs.cloudflare.com/ajax/libs/speakingurl/14.0.1/speakingurl.min.js"></script>
<script>
       $(document).ready(function(){
        $('#nameCategory').keyup(function(){
            const name = $(this).val();
            const url = getSlug(name, { lang: 'vn'});
            $('#urlCategory').val(url);
        });
    });
</script>