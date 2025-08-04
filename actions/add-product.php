<?php
    require_once "../classes/Products.php";

    $product = new Product;

    $product->store($_POST);
?>