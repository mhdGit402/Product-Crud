<?php

$productID = $_GET['id'];


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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "UPDATE product set title='$title', description='$description', price=$price WHERE id='$productID'";

    $result = $conn->query($sql);

    if ($result) {
        header('Location: /2025/PHP/Product-Crud');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;;
    }
}


?>


<?php @require_once("../inc/header.php"); ?>

<?php

$sql = "SELECT * FROM product WHERE id='$productID'";
$result = $conn->query($sql);
$product = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>


<div class="container">
    <h2>Edit product <?php echo $productID; ?></h2>
    <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $_GET['id']; ?>" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Product Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="title" value="<?php echo $product['0']['title'] ?>">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Product Description</label>
            <input type="text" class="form-control" id="description" name="description" value="<?php echo $product['0']['description'] ?>">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Product Price</label>
            <input type="text" class="form-control" id="price" name="price" aria-describedby="price" value="<?php echo $product['0']['price'] ?>">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<?php @require_once("../inc/footer.php"); ?>