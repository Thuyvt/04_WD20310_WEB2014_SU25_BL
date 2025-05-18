<?php 
    // Nhúng file muốn dùng và file chính bằng include
    include "SinhVien.php";

    // sử dụng class SinhVien
    // Khởi tạo object sinh viên
    $sinhVien01 = new SinhVien();

    // Gán giá trị cho object $sinhVien01
    $sinhVien01->hoVaTen = "Nguyễn Sơn Tùng";
    $sinhVien01->namSinh = 2000;
    // ...

    // Gọi phương thức của object
    $sinhVien01->gioiThieuBanThan();

    // Khởi tạo sinh viên thứ 2
    $sinhVien02 = new SinhVien();

    // Gán giá trị thuộc tính
    $sinhVien02->hoVaTen = "Nguyễn Việt Hoàng";
    $sinhVien02->namSinh = 2004;
    $sinhVien02->sdt = '0903299690';
    $sinhVien02->email = "Hoangnvph12345@fpt.edu.vn";

    // Gọi phương thức
    $sinhVien02->gioiThieuBanThan();
?>