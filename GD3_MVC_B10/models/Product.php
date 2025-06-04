<?php
    class Product {
        // Khai báo thuộc tính
        public $id;
        public $name;
        public $price;
        public $category_id;
        public $quantity;
        public $image_src;
        public $created_date;
        public $categoy_name;

        // Nếu trong class không có __construct và __destruct
        // mặc định php hiểu ngầm là có __construct(){} và __desctruct() {}
        
    }
?>