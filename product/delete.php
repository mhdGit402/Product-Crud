<?php require_once("../inc/db.php"); ?>

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
