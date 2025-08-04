<?php
    require_once "Database.php";

    class Product extends Database {

        public function store($reqest){
            $product_name = $reqest['product_name'];
            $price = $reqest['price'];
            $quantity = $reqest['quantity'];

            $sql = "INSERT INTO products (`product_name`, `price`, `quantity`) VALUES ('$product_name', '$price', '$quantity')";

            if ($this->conn->query($sql)) {
            header("Location: ../views/dashboard.php");
            exit;
        } else {
            die("Error adding product: " . $this->conn->error);
        }
        }

        public function getAllProducts(){
            $sql = "SELECT * FROM products";

            $result = $this->conn->query($sql);

            if($result){
                return $result;
            }else{
                die("Error retrieving products: " . $this->conn->error);
            }
        }

        public function getProduct($id){
            $sql = "SELECT * FROM products WHERE id = $id";

            if($result =$this->conn->query($sql)){
                return $result->fetch_assoc();
            }else{
                die('Error retrieving the user: ' . $this->conn->error);
            }
        }

        public function update($reqest){
            $id           = $_GET['id'];
            $product_name = $reqest['product_name'];
            $price        = $reqest['price'];
            $quantity     = $reqest['quantity'];

            $sql = "UPDATE products
                    SET product_name = '$product_name',
                        price = '$price',
                        quantity = '$quantity'
                    WHERE id = $id";

            if($this->conn->query($sql)){
                header("location: ../views/dashboard.php");
                exit;
            }else{
                die("Error updating product: " . $this->conn->error);
            }
        }

        public function delete(){
            session_start();
            $id = $_GET['id'];

            $sql = "DELETE FROM products WHERE id = $id";

            if($this->conn->query($sql)){
                header("location: ../views/dashboard.php");
                exit;
            }else{
                die('Error deleting your account: ' . $this->conn->error);
            }
        }

       public function updateStock($id, $new_quantity) {
        
            $sql = "UPDATE products SET quantity = $new_quantity WHERE id = $id";
            return $this->conn->query($sql);
        }



    }

?>