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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];


    $sql = "INSERT INTO product (title, description, price) VALUES ('$title','$description',$price)";
    $result = $conn->query($sql);

    if ($result) {
        header('Location: /2025/PHP/Product-Crud');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;;
    }
}


?>

<?php @require_once("../inc/header.php"); ?>


<div class="container">
    <h2>Add new product</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Product Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Product Description</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Product Price</label>
            <input type="text" class="form-control" id="price" name="price" aria-describedby="price">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Create</button>
    </form>
</div>

<?php @require_once("../inc/footer.php"); ?>