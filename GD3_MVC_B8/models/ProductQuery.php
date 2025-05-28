<?php
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
                    $product->image_src = $value["image_src"];
                    $product->category_id = $value["category_id"];
                    $product->created_date = $value["created_date"];

                    $danhSach[] = $product;
                }
                return $danhSach;
            } catch(Exception $error) {
                echo "Lỗi: " . $error->getMessage(). "<br>";
            }
        }
    }
?>