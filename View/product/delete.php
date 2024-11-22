<?php
require_once("../../vendor/autoload.php");

use app\Controller\ProductController;

// Controller->ProductController->delete();
$id = $_GET['id'];
ProductController::delete($id);
