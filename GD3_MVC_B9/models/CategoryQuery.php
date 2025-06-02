<?php
    class CategoryQuery {
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
        
        public function all() {
            try {
                // 1. Khai báo sql
                $sql = "SELECT * FROM `category`";
                // 2. Thực thi
                $data = $this->pdo->query($sql)->fetchAll();

                // 3. Convert data
                $danhSachCategory = [];
                foreach($data as $value) {
                    $object = new Category();
                    $object->id = $value["id"];
                    $object->name = $value["name"];
                    $danhSachCategory[] = $object;
                }
                // 4. return dữ liệu
                return $danhSachCategory;
            }catch (Exception $error) {
                echo "Lỗi:" .$error->getMessage();
            }
        }
    }
?>