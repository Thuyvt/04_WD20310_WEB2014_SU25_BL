<?php
    class ProductController {
        
        // Khai báo thuộc
        public $productQuery;
        
        public function __construct() {
            $this->productQuery = new ProductQuery();
        }
        public function __destruct(){}

        // Hàm list() xử lý trường hợp người dùng muốn vào trang danh sách
        public function list() {
            // Gọi hàm trong ProductQuery để lấy ra danh sách trong CSDL
            $danhSachProduct = $this->productQuery->all();
            // Hiển thị view tương ứng
            include "views/product/list.php";
        }

        // Hàm create() {}
        public function create() {
            // Hiển thị view tương ứng
            include "views/product/create.php";
        }

        public function detail($id) {
            if ($id !== "") {
                // Hiển thị view tương ứng
                include "views/product/detail.php";
            } else {
                echo "Lỗi: Không nhận được thông tin <hr>";
            }
        }
        public function update($id) {
            if ($id !== "") {
                // Hiển thị view tương ứng
                include "views/product/update.php";
            } else {
                echo "Lỗi: Không nhận được thông tin <hr>";
            }
        }

        public function delete($id) {
            if ($id !== "") {
                // Hiển thị view tương ứng
                echo "Xóa id: $id <hr>";
            } else {
                echo "Lỗi: Không nhận được thông tin <hr>";
            }
        }
    }
?>