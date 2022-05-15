<?php
    require "./connectSQL.php";
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

// thêm Product
    $productname = $_POST['productname'];
    
    $categoryid = $_POST['category'];
    $UnitPrice = $_POST['price'];
    $image = $_FILES["file"]["name"];
  $sql = "INSERT INTO `product`(`ProductName`, `CategoryID`, `UnitPrice`, `ProductImage`) VALUES ('$productname',$categoryid,$UnitPrice,'$image')";
if(isset($_POST['upload'])){
$query = mysqli_query($conn, $sql);
var_dump($query);
header("location: ListProduct.php");
}

?>
<?php
    $sql_cate = "Select * from category";
    $query_cate = mysqli_query($conn,$sql_cate);
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
    
    <div class="header">
        <div class="left">
            <span>
                <img src="../../img/logo_2.png" width="60px" height="60px" style="border-radius: 50%;">
            </span>
            <span>
                <i class="fas fa-bars" id="bar" style="padding: 10px"></i>
            </span>
        </div>
        <div class="right">
            <span>
                <form class="form-inline myForm" style="padding: 12px">
                    <input type="text" id="search" placeholder="search..." style=" width: 250px; height:35px">
                    <ul>
                        <li><a href="#">Mess</a></li>
                        <li><a href="./Addfood.html">Addfood</a></li>
                        <li><a href="./login.html">login</a></li>
                        <li><a href="./logout.html">logout</a></li>
                        <li><a href="./Bookings.html">bookings</a></li>
                        <li><a href="./Orderpages.html">orderpages</a></li>
                    </ul>
                    <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide="" style="height:35px"><i class="fas fa-search" ></i></button>
                </form>
            </span>
            <span>
                <i class="fas fa-bell" style="padding: 20px"></i>
            </span>
            <span>
                <i class="fas fa-comment-alt" style="padding: 20px"></i>
            </span>
            <span>
                <img src="../../img/AVA1.jfif" width="60px" height="60px" style="border-radius: 50%;">
            </span>
        </div>
    </div>
    <main>
        <div class="left">
            <ul>
                <li><a href="./Dasboard.html">Dasboard</a></li>
                <li><a href="./Bookings.html">Bookings</a></li>
                <li><a href="./Addfood.html">AddFood</a></li>
                <li>Reviews</li>
                <li>Add lists</li>
                <li><a href="./Orderpages.html">Edit Oder</a></li>
                <li>My profile</li>
                <li>
                        <div class="page">
                        Pages<span id='icon'>
                            <i class="fas fa-chevron-right"></i>
                            </span>
                        </div>
                    <ul class="sub_pages">
                        <li class="authen">
                            <div class="authens">
                            Authentication
                            <span id='icon1'>
                                <i class="fas fa-chevron-right"></i>
                            </span>
                            </div>
                            <ul class="sub_authen">
                                <li><a href="./login.html">Login</a></li>
                                <li><a href="./logout.html">Log out</a></li>
                                <li><a href="./forgetpassword.html">Forgot password</a></li>
                            </ul>
                        </li>
                        <li class="error">
                            <div class="errors">
                                Error
                                <span id='icon2'>
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                                </div>
                            <ul class="sub_error">
                                <li><a href="./error401page.html">401 Pages</a></li>
                                <li><a href="./error404pages.html">404 Pages</a></li>
                                <li><a href="./error500pages.html">500 Pages</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <div class="right">
            <h1>Add Category</h1>
            <h2><a href="#">Dasboard</a>/Add Catedory</h2>
            <div class="content_basic">
                <p>Basic info</p>
                <hr/>
                <form method ="POST" action="./AddProduct.php" enctype="multipart/form-data">
                    <label >Tên Sản Phẩm </label><br/>
                    <input type="text" name="productname" class="col-6"><br/>
                    <label >Tên Category </label><br/>
                    <select name="category" class="col-6">
                        <?php 
                        while($row = mysqli_fetch_assoc($query_cate)){?>
                            <option value ="<?php echo $row['CategoryID'] ?>" ><?php echo $row['CategoryName'] ?></option>
                       <?php } ?>
                    </select>
                    <br/>
                    <label >Giá</label><br/>
                    <input type="text" name="price" class="col-6"  >
                    <br/>
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