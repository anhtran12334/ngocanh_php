<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/Dasboard.css">
    <link rel="stylesheet" href="../css/orderpages.css">
</head>
<body>
    <div class="header">
        <div class="left">
            <span>
                <img src="../../img/logo_2.png" width="60px" height="60px" style="border-radius: 50%;">
            </span>
            <span>
                <i class="fas fa-bars" id="bar" style="padding: 12px;"></i>
            </span>
        </div>
        <div class="right">
            <span>
                <form class="form-inline">
                    <input type="text" id="search" placeholder="search..." style=" width: 300px; height:40px">
                    <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide="" style="height:40px"><i class="fas fa-search" ></i></button>
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
            <h1>Order Pages</h1>
            <h2><a href="#">Dasboard</a>/Order Pages</h2>
            <div class="bang">
                <p><i class="fas fa-clipboard-list"></i>All Listings</p>
                <table border="1"  cellspacing="0.4px" >
                    <thead>
                    <tr>
                        <th width=200px>Product name</th>
                        <th  width=200px>CategoryID</th>
                        <th  width=200px>Unit Price</th>
                        <th  width=200px>Product Image</th>
                        <th width=200px> Action </th>
        
                    </tr>
                    </thead>
                    <tbody>
                    <?php
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
                    $sql = "select * from product ";
                    $query = $connection->query($sql);
                    
                    while($row = $query->fetch_row()) {
                        echo "<table border=1 >
                        <tr>
                        <td width=200px>".$row[1]."</td>
                        <td  width=200px>".$row[3]."</td>
                        <td  width=200px>".$row[5]."</td>
                        <td  width=200px><img width='100' height='80' src=./../img/".$row[6]."/></td>
                        <td width=200px> <button><a href='./EditProduct.php?Productid=".$row[0] ."'>Sửa</a></button> <button><a href=''>Xóa</a></button></td>
                        </tr>
                        </table>";
                        

                    }
                    // while($row = $query->fetch_assoc()){
                    //     echo $row["FullName"];
                    // }
?>
                    
                   
                </tbody>
                </table>
            </div>
        </div>
    </main>
    <footer>
        <span>Copyright @ Your website 2021</span>
        <span>Privacy policy . Term conditions</span>
    </footer>
</body>
<script>
    function XacNhanXoa(){
       return confirm("Bạn có chắc chắc muốn xóa danh mục nay hay không ?");
    }
</script>
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