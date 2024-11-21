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

$sql = "SELECT * FROM product";
$result = $conn->query($sql);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<?php @require_once("inc/header.php"); ?>

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
        $sql = "SELECT * FROM product where title like '%" . $_REQUEST['search'] . "%'";
        $result = $conn->query($sql);
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
?>

<div class="container">
    <div class="header">
        <h2>Product List</h2>
        <a href="product/"><button type="button" class="btn btn-primary">Create Product</button></a>
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
                            <a href="product/update.php/?id=<?php echo $product['id'] ?>">
                                <button type="button" class="btn btn-outline-primary">Edit</button>
                            </a>
                            <a href="product/delete.php/?id=<?php echo $product['id'] ?>">
                                <button type="button" class="btn btn-outline-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<?php @require_once("inc/footer.php"); ?>