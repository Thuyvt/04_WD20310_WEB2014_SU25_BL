<?php 
    // 1. Khai báo biế
    // Sử dụng ký tự $ để bắt đầu khai báo
    $tenSanPham = "Bình hoa pha lê"; // string
    $soLuong = 9; // number
    $trangThaiHienThi = true; // boolean

    // 2. In ra giá trị biến
    // Sử dụng echo
    // Dữ liệu sẽ bị convert về dạng string và in ra màn hình
    echo $tenSanPham;
    echo $trangThaiHienThi;
    echo "<br>";

    // Sử dựng var_dump
    // In ra màn hình kiểu dữ liệu và giá trị biến
    var_dump($tenSanPham);
    var_dump($trangThaiHienThi);
    echo "<br>";

    // sử dụng echo dạng ngắn 1 dòng
    // các biến cách nhau bởi dấu ,
    echo $tenSanPham, $soLuong, $trangThaiHienThi, "<br>";
    echo "<hr>";

    // In giá trị biến kết hợp đoạn văn
    // Sử dụng dấu nháy kép "" để in được giá trị biến
    echo "Tên sản phẩm: $tenSanPham";
    echo "<br>";
    echo 'Tên sản phẩm: $tenSanPham'; // Lỗi 
    echo '<br>';
    // Sử dụng dấu . để nối chuỗi
    echo "Tên sản phẩm: " . $tenSanPham .", số lượng: " .$soLuong;
?>