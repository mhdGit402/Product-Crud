<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "2025_product_crud";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<?php
$productID = $_REQUEST['id'];
$prepareSql = "SELECT * from product where id='$productID'";
if ($conn->query($prepareSql)->num_rows > 0) {
    $sql = "DELETE FROM product where id='$productID'";
    $result = $conn->query($sql);

    if ($result) {
        header('Location: /2025/PHP/Product-Crud');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;;
    }
} else {
    header('Location: /2025/PHP/Product-Crud/?code=404&msg=Product not found!');
}
