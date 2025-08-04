<?php
    require_once "../classes/Products.php";

    $product = new Product;

    $_POST['id'] = $_GET['id'];
    $product->update($_POST);
?>