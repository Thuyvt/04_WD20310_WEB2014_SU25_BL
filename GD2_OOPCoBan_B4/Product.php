<?php
    class Product {
        // Khai báo thuộc
        public $id;
        public $name;
        public $price;
        public $quantity;

        // Khai báo hàm
        public function __construct() {}
        public function __destruct() {}

        public function displayProductInfor() {
            echo "ID: " .$this->id. "<br>";
            echo "Tên: " .$this->name. "<br>";
        }
    }
?>