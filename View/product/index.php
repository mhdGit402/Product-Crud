<?php
require_once("../../inc/header.php");
require_once '../../vendor/autoload.php';

use app\Controller\ProductController;
// Controller->ProductController->store();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product = [
        "title" => $_POST['title'],
        "description" => $_POST['description'],
        "price" => $_POST['price']
    ];
    ProductController::store($product);
}

?>

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

<?php @require_once("../../inc/footer.php"); ?>