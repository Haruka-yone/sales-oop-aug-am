<?php
    session_start();
    require_once "../classes/Products.php";

    $product_obj = new Product;
    $product = $product_obj->getProduct($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

    <!-- bootstrap cdn  bscdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <nav class="navbar navbar-expand" style="margin-bottom: 80px;">
        <div class="container">
            <div class="row w-100 align-items-center">
                <div class="col text-start">
                    <a href="dashboard.php" class="navbar-brand">
                        <i class="fa-solid fa-house text-dark fs-2"></i>
                    </a>
                </div>
                <div class="col text-center">
                    <span class="navbar-text fw-bold fs-3"> Welcome,<?= $_SESSION['first_name'] ?></span>
                </div>
                <div class="col text-end">
                    <form action="../actions/logout.php" method="post">
                        <button type="submit" class="text-danger bg-transparent border-0"><i class="fa-solid fa-user-xmark fs-2"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="row justify-content-center gx-0">
        <div class="col-4">
            <h1 class="text-center text-warning mb-4"><i class="fa-solid fa-pen-to-square"></i> Edit Product</h1>

            <form action="../actions/edit-product.php?id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="first_name" class="form-label">Product Name</label>
                    <input type="text" name="product_name" id="product_name" class="form-control" value="<?= $product['product_name']?>" required autofocus>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="last_name" class="form-label">Price</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" name="price" id="price" class="form-control" value="<?= $product['price']?>" required>
                        </div>
                        
                    </div>

                    <div class="col mb-4">
                        <label for="username" class="form-label">Quantity</label>
                        <input type="text" name="quantity" id="quantity" class="form-control fw-bold" value="<?= $product['quantity']?>" maxlength="15" required>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-warning w-100 px-5">Edit</button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>