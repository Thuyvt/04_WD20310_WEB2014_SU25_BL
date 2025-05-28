<?php
    // 1. Nhúng tất cả các file trong model, controller
    include "models/Product.php";
    include "models/ProductQuery.php";
    // include "models/Category.php";
    // include "models/CategoryQuery.php";

    include "controllers/ProductController.php";

    // 2. Lấy giá trị cần thiết từ url

    // Lấy giá trị act
    $act = "";
    if (isset($_GET["act"])) {
        $act = $_GET["act"];
    }
    echo "Giá trị act là: $act <hr>";

    // Lấy giá trị id trên url
    $id = "";
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    }
    echo "Giá trị id là :$id<hr>";
    // Điều hướng sang trang cần thiết
    match($act) {
        '' => (new ProductController)->list(),
        'product-list' => (new ProductController)->list() ,
        'product-create' => (new ProductController)->create(),
        'product-detail' => (new ProductController)->detail($id),
        'product-update' => (new ProductController)->update($id),
        'product-delete' => (new ProductController)->delete($id)
    };
    // echo "Đây là trang chủ";
?>