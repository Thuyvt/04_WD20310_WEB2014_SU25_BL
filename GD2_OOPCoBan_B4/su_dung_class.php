<?php
    // Nhúng file
    include "ProductQuery.php";

    // Khởi tạo object từ class ProductQuery
    $productQuery = new ProductQuery();

   // Gọi hàm lấy danh sách
   echo "Danh sách sản phẩm <br>";
   $danhSachSP = $productQuery->all();
   var_dump($danhSachSP);
   echo "<hr>";

   // Gọi hàm lấy thông tin chi tiết
   echo "Chi tiết sản phẩm:<br>";
   $product = $productQuery->find(10);
//    var_dump($product);
   if ($product !== null) {
        $product->displayProductInfor();
   }
   echo "<hr>";

   // Gọi hàm xóa thông tin sản phẩm 
   echo "Xóa thông tin sản phẩm: <br>";
   $result = $productQuery->delete(1);
   if ($result === 1) {
        echo "Xóa thành công<br>";
   } else {
        echo "Xóa thất bại<br>";
   }
   echo "<hr>";

   // Gọi hàm tạo mới thông tin sản phẩm
   echo "Tạo mới sản phẩm:<br>";
   // Tạo thông tin đối tượng cần insert
   $product = new Product();
   $product->name = "OPPO R7";
   $produc->price = 12312;
   $product->quantity = 12;

   $result = $productQuery->insert($product);
   if ($result === 1) {
        echo "Thêm thành công<br>";
   } else {
        echo "Thêm thất bại<br>";
   }
   echo "<hr>";
?>