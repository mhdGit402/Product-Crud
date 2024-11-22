<?php

require_once("../inc/header.php");
require_once '../vendor/autoload.php';

use app\Controller\ProductController;

// Controller->ProductController->index();
$products = ProductController::index();

?>

<?php if (!empty($_GET)) : ?>
    <?php if (!empty($_REQUEST['code']) && !empty($_REQUEST['msg'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo $_REQUEST['code'] . ' - ' ?></strong><?php echo $_REQUEST['msg'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
<?php endif ?>

<?php if (!empty($_GET)) {
    if (!empty($_REQUEST['search'])) {
        // Controller->ProductController->show();
        $query = "where title like '%" . $_REQUEST['search'] . "%'";
        $products = ProductController::show($query);
    }
}
?>

<div class="container">
    <div class="header">
        <h2>Product List</h2>
        <a href="../view/product/"><button type="button" class="btn btn-primary">Create Product</button></a>
        <form id="form-search" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="input-group mb-3">
                <input type="text" name="search" id="search" class="form-control" placeholder="Search Product" aria-label="Search Product" aria-describedby="button-addon2">
                <button name="search-product" id="search-product" class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            </div>
        </form>
    </div>
    <div class="main">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Created</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <th scope="row"><?php echo $product['id'] ?></th>
                        <td><?php echo $product['title'] ?></td>
                        <td><?php echo $product['price'] ?></td>
                        <td><?php echo $product['created'] ?></td>
                        <td>
                            <a href="../View/product/update.php/?id=<?php echo $product['id'] ?>">
                                <button type="button" class="btn btn-outline-primary">Edit</button>
                            </a>
                            <a href="../View/product/delete.php/?id=<?php echo $product['id'] ?>">
                                <button type="button" class="btn btn-outline-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<?php require_once("../inc/footer.php"); ?>