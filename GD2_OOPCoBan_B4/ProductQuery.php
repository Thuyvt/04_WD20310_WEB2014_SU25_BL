<?php
    include "Product.php";

    class ProductQuery {
        // Khai báo thuộc tính, lưu trữ thông tin kết nối CSDL
        public $pdo;

        // Khai báo phương thức
        public function __construct() {
            // Sử dụng chuẩn kết nối PDO kết nối CSDL 
            try {
                $this->pdo = new PDO("mysql:host=localhost; port=3306; 
                dbname=04_wd20310_web2014_su25_bl1", "root", "");
                echo "// Kết nối CSDL thành công <hr>";
            } catch(Exception $error) {
                echo "// Lỗi:" . $error->getMessage();
                echo "<hr>";
            }
        }
        public function __destruct() {
            // Đóng kết nối với CSDL
            $this->pdo = null;
        }

         // Hàm lấy danh sách trong csdl
        public function all() {
            try {   
                // 1. Khai báo sql
                $sql = "SELECT * FROM `product`";

                // 2. Thực thi câu lệnh
                $data = $this->pdo->query($sql)->fetchAll();
                // echo "<pre>";
                // var_dump($data);
                // 3. Convert dữ liệu sang dạng object Product
                $danhSach = [];
                foreach($data as $value) {
                    $product = new Product();
                    $product->id = $value["id"];
                    $product->name= $value["name"];
                    $product->price = $value["price"];
                    $product->quanity = $value["quantity"];

                    $danhSach[] = $product;
                }
                return $danhSach;
            } catch(Exception $error) {
                echo "Lỗi: " . $error->getMessage(). "<br>";
            }
        }

        // Lây thông tin chi tiết 1 bản ghi
        public function find($id) {
            try {
                // 1. Câu lệnh sql
                $sql = "SELECT * FROM `product` WHERE id = $id;";
                // 2. Thực thi câu lệnh
                $data = $this->pdo->query($sql)->fetch();
                // Kiểm tra xem bản ghi có tồn tại hay không
                // $data = false là bản ghi không tồn tại
                if ($data === false) {
                    echo "// Bản ghi không tồn tại<br>";
                    return;
                } else {
                    // Convert dữ liệu sang object Product
                    $product = new Product();
                    $product->id = $data["id"];
                    $product->name= $data["name"];
                    $product->price = $data["price"];
                    $product->quanity = $data["quantity"];

                    return $product;
                }

            } catch(Exception $error) {
                echo "Lỗi: " .$error->getMessage(). "<br>";

            }

        }

        // Hàm xử lý xóa theo id
        public function delete($id) {
            try {
                // 1. Chuẩn bị câu lệnh
                $sql = "DELETE FROM product WHERE `product`.`id` = $id";
                // 2. Thực thi câu lệnh
                $data = $this->pdo->exec($sql);
                // Lưu ý $data = 1 nếu thành công 
                return $data;
            } catch(Exception $error) {
                echo "Lỗi: " .$error->getMessage() ."<br>";
            }
        }

        // Hàm xử lý thêm mới sản phẩm
        public function insert(Product $product) {
            try {
                // 1. Chuẩn bị câu lệnh
                $sql = "INSERT INTO `product` (`id`, `name`, `price`, `quantity`) 
                VALUES (NULL, '".$product->name."', '".$product->price."', '".$product->quantity."');";
                // 2. Thực thi câu lệnh
                $data = $this->pdo->exec($sql);
                // Lưu ý $data = 1 nếu thành công 
                return $data;
            } catch(Exception $error) {
                echo "Lỗi: " .$error->getMessage() ."<br>";
            }
        }
    }

?>