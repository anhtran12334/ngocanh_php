<?php
     var_dump($_FILES);
    if(isset($_POST["upload"])){
        $target_dir = "./../img/";
        $target_file = $target_dir.basename($_FILES["file"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType !="jpeg" && $imageFileType != "gif" ) {
            echo 'chi cho upload file anh ';
        }else{
        if(isset($_FILES["file"]) && !$_FILES["file"].["error"]){
            move_uploaded_file($_FILES["file"]["tmp_name"],'./../img/'.$_FILES["file"]["name"]); 
            echo "thanh cong";
        }
        else{
            echo "error";
        }
    }
}
//var_dump($_POST);
// var_dump($_GET);
$username = "root";
$password = "12345678";

$host = "localhost";
$database = "smartphone";
//to connect database with myqli
$connection = new mysqli($host, $username, $password, $database);
// var_dump($connection);
if($connection->connect_error){
    die("connection error");
}
// thêm category
    $categoryname = $_POST['categoryname'];
    
    $description = $_POST['descrition'];
    $image = $_FILES["file"]["name"];
  $sql = "INSERT INTO `category`( `CategoryName`, `Description`, `Picture`) VALUES ('$categoryname','$description','$image')";
if(isset($_POST['upload'])){
$query = $connection->query($sql);
var_dump($query);
//header("location: ListCategory.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/Dasboard.css">
    <link rel="stylesheet" href="../css/Addfood.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
</head>
<body>
    <?php  include './common/header.php'?>
    <main>
    <?php  include './common/left.php'?>
        <div class="right">
            <h1>Add Category</h1>
            <h2><a href="#">Dasboard</a>/Add Catedory</h2>
            <div class="content_basic">
                <p>Basic info</p>
                <hr/>
                <form method ="POST" action="./AddCategory.php" enctype="multipart/form-data">
                    <label for="foodname">Tên Danh Mục</label><br/>
                    <input type="text" name="categoryname" class="col-6"><br/>
                    <label for="description">Mô tả</label><br/>
                    <textarea name="descrition" class="col-12" style="height:300px" ></textarea>
                    <label for="image">Hình ảnh minh họa</label><br/>
                    <!-- <div class="col-3 text-center" style="border: 1px solid gray; height: 300px; line-height: 300px; "> -->
                    <input type="file" name="file" style="line-height: 20px;" value="chọn ảnh">
                    <!-- </div> -->
                    <button name="upload" type="submit" class="end text-right" style="height:30px;line-height:30px;">Lưu</button>
                </form>
                
            </div>
        </div>
        
        
    </main>
    <footer>
        <span>Copyright @ Your website 2021</span>
        <span>Privacy policy . Term conditions</span>
    </footer>
    
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="./../../../bai9_jquery/bai9_jquery/js/jquery.min.js"></script>
<script src="../script/Dasboard.js"></script>

</html>