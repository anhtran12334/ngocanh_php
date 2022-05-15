<?php
   require "./../connectSQL.php";
?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $sql = "DELETE FROM `vendors` WHERE id = $id";
    mysqli_query($conn,$sql);
    header("location: ListVendors.php");
?>
