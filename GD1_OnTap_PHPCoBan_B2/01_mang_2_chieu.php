<?php 
    // Khu vực viết code logic
    // 1. Khai báo mảng 2 chiều
    $danhSachSinhVien = array(
        array("ten" => "Nguyễn Văn A", "tuoi" => 18, "diaChi" => "Hà Nội"),
        array("ten" => "Nguyễn Văn B", "tuoi" => 20, "diaChi" => "Hà Nội"),
        array("ten" => "Nguyễn Thị C", "tuoi" => 22, "diaChi" => "Hà Nam"),
        array("ten" => "Trần Văn D", "tuoi" => 19, "diaChi" => "Nam Định"),
        array("ten" => "Vũ Thị E", "tuoi" => 20, "diaChi" => "Vĩnh Phúc"),
    ); 

    // Kiểm tra dữ liệu submit form
    echo "Log thử tất cả giá trị người dùng nhập vào form: <br>";
    var_dump($_GET);
    echo "<br><br>";

    // nếu submit form tìm kiếm tuyệt đối
    if (isset($_GET["btnTuyetDoi"])) {
        echo "Submit form tuyệt đối. Bắt đầu xử lý logic <br>";
        // lấy dữ liệu nhập vào form, lưu vào viến
        $tenTimKiem = trim($_GET["tenTimKiem"]);
        echo $tenTimKiem;
        if ($tenTimKiem !== "") {
            // Duyệt mảng chính kiểm tra phần tử không thỏa mãn điều kiện, xóa bỏ phần tử khỏi mảng
            foreach ($danhSachSinhVien as $key => $value) {
                if ($value["ten"] !== $tenTimKiem) {
                    unset($danhSachSinhVien[$key]);
                }
            }
        }
    }

    // nếu submit form tương đối
    if (isset($_GET["btnTuongDoi"])) {
        // lấy dữ liệu nhập vào từ form lưu vào biến cần thiết
        $tenTimKiem = trim($_GET["tenTimKiem"]);
        $diaChiTimKiem = trim($_GET["diaChiTimKiem"]);

        // Kiểm tra giá trị nhập vào
        if ($tenTimKiem !== "") {
            // duyệt mảng kiểm tra phần tử không thỏa mãn, xóa khỏi mảng
            foreach($danhSachSinhVien as $key=>$value) {
                $viTri = strpos(strtolower($value["ten"]), strtolower($tenTimKiem));
                // không tìm thấy ký tự trong đôi tượng đang kiểm tra, thực hiện xóa khỏi mảng
                if ($viTri === false) {
                    unset($danhSachSinhVien[$key]);
                }

            }
        }
        // kiểm tra theo địa chỉ
        if ($diaChiTimKiem !== "") {
            // duyệt mảng kiểm tra phần tử không thỏa mãn, xóa khỏi mảng
            foreach($danhSachSinhVien as $key=>$value) {
                $viTri = strpos(strtolower($value["diaChi"]), strtolower($diaChiTimKiem));
                // không tìm thấy ký tự trong đôi tượng đang kiểm tra, thực hiện xóa khỏi mảng
                if ($viTri === false) {
                    unset($danhSachSinhVien[$key]);
                }

            }
        }
    }
?>
<!-- Khu vực hiển thị html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        th, td {
            padding: 8px 10px;
        }
    </style>
    <!-- Danh sách bảng dữ liệu -->
     <h3>Danh sách sinh viên</h3>
     <table border="1">
        <!-- Khu vực tiêu đêf -->
        <thead>
            <tr>
                <th>Tên</th>
                <th>Tuổi</th>
                <th>Địa chỉ</th>
            </tr>
        </thead>
        <!-- Khu vực bảng dữ liêu -->
        <tbody>
            <?php 
                if (count($danhSachSinhVien) > 0) {
                    foreach ($danhSachSinhVien as $value) {
                        // var_dump( $value["ten"]);
                        echo "   <tr> ";
                        echo "           <td>".$value["ten"]."</td>";
                        echo "           <td>".$value["tuoi"]."</td>";
                        echo "           <td>".$value["diaChi"]."</td>";
                        echo "       </tr>";
                    }
                } else {
                    echo "<tr>";
                    echo "<td colspan='3'> Không có dữ liệus</td>";
                    echo "</tr>";
                }
            ?>
         
        </tbody>
     </table>
     <!-- Khu vực tìm kiếm tuyệt đối -->
      <h3>1. Form tìm kiếm tuyệt đối</h3>
      <p>Logic:</p>
      <ul>
        <li>Nhập đầy đủ tên sinh viên để tìm kiếm</li>
        <li>Hỗ trợ loại bỏ khoảng trắng đầu và cuối</li>
      </ul>
      <form action="" medthod="GET">
            <span>Nhập tên:</span>
            <input type="text" name="tenTimKiem">
            <button type="submit" name="btnTuyetDoi"> Tìm kiếm</button>
      </form>

      <!-- Khu vực form tìm kiếm tương đối -->
    <h3> 2. Form tìm kiếm tương đối</h3>
    <p>Logic:</p>
    <ul>
        <li>Hỗ trợ nhập 1 vài ký tự và tìm kiếm được</li>
        <li>Hỗ trợ loại bỏ khoảng trắng đầu và cuối</li>
        <li>Hỗ trợ tìm kiếm không phân biệt hoa thương</li>
        <li>Hỗ trợ hiển thị lại giá trị vừa nhập trước đó</li>
        <li>Hỗ trợ tìm kiếm theo tên và địa chỉ</li>
        <li>Hỗ trợ button tải lại</li>
    </ul>
    <form action="" method="GET">
        <span>Nhập tên: </span>
        <?php 
            if (!isset($_GET["btnTuongDoi"])) {
                echo '<input type="text" name="tenTimKiem">';
            } else {
                echo  '<input type="text" name="tenTimKiem" value="'.$tenTimKiem. '">' ;
            }
        ?>
        <!-- <input type="text" name="tenTimKiem" value="nguyễn"> -->
        <span>Nhập địa chỉ: </span>
        <?php 
            if (!isset($_GET["btnTuongDoi"])) {
                echo '<input type="text" name="diaChiTimKiem">';
            } else {
                echo  '<input type="text" name="diaChiTimKiem" value="'.$tenTimKiem. '">' ;
            }
        ?>
        <input type="text" name="diaChiTimKiem">
        <button type="submit" name="btnTuongDoi">Tìm kiếm</button>
    </form>
</body>
</html>

