<?php
    session_start();

    require_once "../classes/Products.php";

    $product_obj = new Product;
    $products = $product_obj->getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>

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
        <div class="col-6">
            <div class="d-flex mb-2">
                <h2>Prodact List</h2>
                <a href="#" class="text-decoration-none text-info fs-1 ms-auto" data-bs-toggle="modal" data-bs-target="#addProductModal" title="Add Product">
                    <i class="fa-solid fa-plus"></i>
                </a>
            </div>
                
                <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <h1 class="modal-title text-center text-info py-3" id="addProductModalLabel"><i class="fa-solid fa-box"></i>Add Product</h1>

                        <form action="../actions/add-product.php" method="post">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="product_name" class="form-label">Product Name</label>
                                    <input type="text" name="product_name" id="product_name" class="form-control" required>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" name="price" id="price" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="number" name="quantity" id="quantity" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="px-3 mb-4">
                            <button type="submit" class="btn btn-info w-100">Save</button>
                            </div>
                        </form>
                     </div>
                    </div>
                </div>

            <?php
            if($products->num_rows >= 1){  
            ?>
            <table class="table table-hover align-middle">
                <thead class="table-dark text-white">
                    <tr>
                        <th>ID</th>
                        <th>product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody> 
                    <?php
                        foreach($products as $product){
                    ?>
                    <tr>
                        <td><?= $product['id']?></td>
                        <td><?= $product['product_name']?></td>
                        <td><?= $product['price']?></td>
                        <td><?= $product['quantity']?></td>
                        <td><a href="edit-product.php?id=<?= $product['id'] ?>" class="btn btn-warning" title="Edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>

                            <a href="../actions/delete-product.php?id=<?= $product['id'] ?>" class="btn btn-danger" title="Delete">
                                <i class="fa-regular fa-trash-can"></i>
                            </a>
                        </td>
                        <td>
                            <?php
                            if($product['quantity'] > 0){                          
                            ?>
                            <a href="buy-product.php?id=<?= $product['id'] ?>" class="btn btn-success" title="Delete">
                                <i class="fa-solid fa-cash-register"></i>
                            </a>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <?php        
                        }
                    ?>
                </tbody>
            </table>
            <?php
            }else{
            ?>  
                    <div class="text-center bg-dark p-5">
                        <h1 class="text-danger text-center">No Records found</h1>
                        <i class="fa-solid fa-circle-xmark text-danger display-3"></i>
                    </div>
            <?php 
            }
            ?>
        </div>
    </main>
</body>
</html>