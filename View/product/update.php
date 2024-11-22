<?php
require_once("../../inc/header.php");
require_once '../../vendor/autoload.php';

use app\Controller\ProductController;

$query = "WHERE id='" . $_GET['id'] . "'";
$product = ProductController::show($query);

// Controller->ProductController->update();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        "id" => $_GET['id'],
        "title" => $_POST['title'],
        "description" => $_POST['description'],
        "price" => $_POST['price']
    ];
    ProductController::update($data);
}

?>

<div class="container">
    <h2>Edit product <?php echo $_GET['id']; ?></h2>
    <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $_GET['id']; ?>" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Product Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="title" value="<?php echo $product['0']['title'] ?? '' ?>">
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

<?php require_once("../../inc/footer.php"); ?>