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
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $sql = "DELETE FROM `category` WHERE CategoryID = $id";
    mysqli_query($conn,$sql);
    header("location: ListCategory.php");
?>
