<?php
    $username = "root";
    $password = "12345678";
    $host = "localhost";
    $database = "smartphone";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    // Check connection
    
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
?>
<?php
    // var_dump($_FILES);
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
?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
?>
<?php
    $sql_up = "SELECT * FROM category WHERE CategoryID = $id";

    $qr_up = mysqli_query($conn,$sql_up);
    //var_dump($qr_up);
    $rows_up = mysqli_fetch_assoc($qr_up);
    
    //var_dump($rows_up);
    var_dump($_POST);
   
       $categoryname = $_POST['categoryname'];
       //var_dump($_POST['categoryname']);
       $description = $_POST['description'];
       if($_FILES['file']['name'] == ''){
            $image = $rows_up['Picture'];
       }else{
            $image = $_FILES['file']['name'];
       }
      // $sql_u = "UPDATE `category`SET `CategoryName` = '$categoryname' , `Description` = '$description', `Picture` = '$image'";
       $sql = "UPDATE category SET `CategoryName`='$categoryname',`Description`='$description',`Picture`='$image' WhERE CategoryID = $id";
       if(isset($_POST["upload"])){
       $query = mysqli_query($conn,$sql);
       var_dump($query);
       header("location: ListCategory.php");
   }

?>

 <form method ='POST' enctype='multipart/form-data'>
    <label for='foodname'>Tên Danh Mục</label><br/>
    <input type='text' name='categoryname' class='col-6' value="<?php  echo $rows_up ['CategoryName'];?>"><br/>
    <label for='description'>Mô tả</label><br/>
    <input name='description' class='col-12' style='height:300px' value = "<?php  echo $rows_up['Description'];?>">
    <label for='image'>Hình ảnh minh họa</label><br/>
    <!-- <div class='col-3 text-center' style='border: 1px solid gray; height: 300px; line-height: 300px; '> -->
    <input type='file' name='file' style='line-height: 20px;' value='chọn ảnh'>
    <!-- </div> -->
    <button name='upload' type='submit' class='end text-right' style='height:30px;line-height:30px;'>Lưu</button>
</form>

