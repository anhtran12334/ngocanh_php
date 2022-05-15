<?php
    require "./../connectSQL.php";
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $sql_up = "SELECT * FROM users where id = $id";
    $qr_up = mysqli_query($conn,$sql_up);
    $row_up = mysqli_fetch_assoc($qr_up);
    if(isset($_POST['upload'])){
        // $sql = "SELECT * FROM vendors ";
        // $qr = $mysqli_query($conn,$sql);
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $role = $_POST['role'];
        $user_name = $_POST['user_name'];
        $created_date = $row_up['created_date'];
        //var_dump($created_date);
        $password = $_POST['password'];
        $address = $_POST['address'];
        
        $sql = "UPDATE `users` SET `email`='$email',`password`='$password',`first_name`='$first_name',`last_name`='$last_name',`phone`='$sdt',`address`='$address',`created_date`='$created_date',`user_name`='$user_name',`role`='$role' WHERE id  = $id";
        $qr = mysqli_query($conn,$sql);
        header("location: ListUsers.php");
        var_dump($qr);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Users</title>
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
            <h1>Edit User</h1>
            <h2><a href="#">Dasboard</a>/Edit User</h2>
            <div class="content_basic">
                <p>Basic info</p>
                <hr/>
                <form method ="POST" action="">

                    <label>Fist Name</label><br>
                    <input type ="text" name="first_name" class="col-6" value="<?php  echo $row_up['first_name']?>"><br><br>
                    <label>Last Name</label><br>
                    <input type ="text" name="last_name" class="col-6" value="<?php  echo $row_up['last_name']?>"><br><br>
                    <label>User Name </label><br>
                    <input type ="text" name="user_name" class="col-6" value="<?php  echo $row_up['user_name']?>"><br><br>
                    <label>Email</label><br>
                    <input type ="text" name="email" class="col-6" value="<?php  echo $row_up['email']?>"><br><br>
                    <label>Password</label><br>
                    <input type ="text" name="password" class="col-6" value="<?php  echo $row_up['password']?>"><br><br>
                    <label>SDT</label><br>
                    <input type ="text" name="sdt" class="col-6" value="<?php  echo $row_up['phone']?>"><br><br>
                    <label>Địa chỉ</label><br>
                    <input type ="text" name="address" class="col-6" value="<?php  echo $row_up['address']?>"><br><br>
                    <label>Vai trò</label><br>
                    <input type ="text" name="role" class="col-6" value="<?php  echo $row_up['role']?>"><br><br>
                    <br><input type="submit" name="upload" value="Lưu" class="end text-right blue" >
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
<script src="./../../script/Dasboard.js"></script>

</html>