<?php
    require "./../connectSQL.php";
    $color = $_POST['colorname'];
    $sql = "INSERT INTO `colors`(`name`) VALUES ('$color')";
    if(isset($_POST['upload'])){
    $qr = mysqli_query($conn, $sql);
    header("Location : ListColor.php");
    //var_dump($qr);
    }
    $sql_ven = "select * from vendors";
    $qr_ven = mysqli_query($conn, $sql_ven);
    $sql_user = "select * from users";
    $qr_user = mysqli_query($conn, $sql_user);
    $sql_pro = "select * from products";
    $qr_pro = mysqli_query($conn, $sql_pro);
    
    // $sql_pros.$i = "select * from products";
    // $qr_pros = mysqli_query($conn, $sql_pros);
    //var_dump($_POST);
    if(isset($_POST['upload'])){

        $date = gmdate("Y-m-d H:i:s", time()+7*60*60);
        //var_dump($date);
        $vendors = $_POST['vendors'];
        $user = $_POST['users'];
        $sql_im ="INSERT INTO `importations`(`vendor_id`, `user_id`, `import_date`) VALUES ($vendors,$user,'$date')";
        $qr_im = mysqli_query($conn, $sql_im);
        //var_dump($qr_im);
        $sql_id =  "select * from `importations` where import_date = '$date'";
        
        $qr_idm = mysqli_query($conn, $sql_id);
        $row_idm = mysqli_fetch_assoc($qr_idm);
        //var_dump($row_idm['id']);
        $idm = $row_idm['id'];
        //
        //
        $sql_impro = "INSERT INTO `importation_products`(`product_id`, `importation_id`, `quantity`, `price`) VALUES ";
        
        $products = $_POST['product'];
        $products = array_values($products);
        $quantity = $_POST['quantity'];
        $price= $_POST['price'];
        for($i = 0 ; $i < count($products) ; $i++){
            $product_id = $products[$i]['id'];
            $quantity = $products[$i]['quantity'];
            $price = $products[$i]['price'];
            $sql_impro .= " ($product_id,$idm, $quantity, $price) ,";
            //var_dump($products[$i]);
        }
        $sql_impro = substr_replace($sql_impro ,"", -1);
        var_dump($sql_impro);
        $qr_impro = mysqli_query($conn,$sql_impro);
        var_dump($qr_impro);

        // update quantity
        for($i = 0 ; $i < count($products) ; $i++){
        $product_id = $products[$i]['id'];
        $sql_update = "UPDATE products join importation_products on products.id = importation_products.product_id join importations on importations.id = importation_products.importation_id set products.quantity = products.quantity + importation_products.quantity where importations.id = $idm and products.id = $product_id"; 
        $qr_update = mysqli_query($conn,$sql_update);
        var_dump($qr_update);
        }
        //
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
    <link rel="stylesheet" href="./../../css/Dasboard.css">
    <link rel="stylesheet" href="./../../css/Addfood.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
</head>
<body>
    <?php  include '../common/header.php'?>
    <main>
    <?php  include '../common/left.php'?>
        <div class="right">
            <h1>Add Importation</h1>
            <h2><a href="#">Dasboard</a>/Add Importation</h2>
            <div class="content_basic">
                <p>Basic info</p>
                <hr/>
                <form method ="POST" action="">
                    <label>Nhà cung cấp</label>
                    <select name="vendors">
                        <?php 
                            while($row_ven = $qr_ven->fetch_assoc()){
                        ?>
                            <option value="<?php echo $row_ven['id'] ?>"><?php echo $row_ven['name'] ?></option>
                           <?php } ?>
                        
                    </select><br><br>
                    <lable>Nhân viên nhận hàng</lable>
                    <select name="users">
                        <?php 
                            while($row_user = $qr_user->fetch_assoc()){
                        ?>
                            <option value="<?php echo $row_user['id'] ?>"><?php echo $row_user['first_name'] ?></option>

                           <?php } ?>
                        
                    </select><br><br>


                    
                    <p>Danh sách sản phẩm muốn nhập</p>
                    <lable>Tên Sản phẩm</lable>
                    <select name="product[product1][id]">
                        <?php 
                            while($row_pro = $qr_pro->fetch_assoc()){

                        ?>
                            <option value="<?php echo $row_pro['id'] ?>"><?php echo $row_pro['name'] ?></option>

                           <?php } 
                                mysqli_data_seek($qr_pro, 0);
                           ?>
                        
                    </select><br><br>
                    <lable>Số lượng </lable>
                    <input type="text" name="product[product1][quantity]" class="col-4"><br/><br>
                    <lable>Đơn giá</lable>
                    <input type="text" name="product[product1][price]" class="col-4"><br/><br>

                    <lable>Tên Sản phẩm</lable>
                    <select name="product[product2][id]">
                        <?php 
                            while($row_pro = $qr_pro->fetch_assoc()){
                        ?>
                            <option value="<?php echo $row_pro['id'] ?>"><?php echo $row_pro['name'] ?></option>

                           <?php } 
                                mysqli_data_seek($qr_pro, 0);
                           ?>
                           
                        
                    </select><br><br>
                    <lable>Số lượng </lable>
                    <input type="text" name="product[product2][quantity]" class="col-4"><br/><br>
                    <lable>Đơn giá</lable>
                    <input type="text" name="product[product2][price]" class="col-4"><br/><br>



                    <p>Thêm sản phẩm</p>
                    <button name="upload" type="submit" class="end text-right blue" >Lưu</button>

                
                </form>
                
            </div>
        </div>
        
        
    </main>
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