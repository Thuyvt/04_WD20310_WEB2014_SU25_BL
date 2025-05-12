<?php 
    try {
        $br = "<br>";
        $hr = "<hr>";

        // VD: Hàm tính diện tích hình chữ nhật
        $chieuDai = 10;
        $chieuRong = 5;

        // 1.1 Sử dụng hàm không tham số, không có giá trị trả về
        function hamKieu01() {
            // global để truy cập các biến bên ngoài hàm
            global $chieuDai, $chieuRong, $br;
            $dienTich = $chieuDai * $chieuRong;
            echo "Diện tích: $dienTich";
            echo $br;
        }
        // gọi hàm
        hamKieu01();

        // 1.2 Sử dụng hàm có tham số, không có giá trị trả về
        function hamKieu02($thamSoChieuDai, $thamSoChieuRong) {
            $dienTich = $thamSoChieuDai * $thamSoChieuRong;
            echo "Diện tích: $dienTich";
        }
        // gọi hàm
        hamKieu02($chieuDai, $chieuRong);
        echo $br;

        // 1.3 Sử dụng hàm có tham số, có giá trị trả về
        function hamKieu03($thamSoChieuDai, $thamSoChieuRong) {
            // $dienTich = $thamSoChieuDai * $thamSoChieuRong;
            return $thamSoChieuDai * $thamSoChieuRong;
        }
        // gọi hàm
        $dienTichK3 = hamKieu03($chieuDai, $chieuRong);
        echo "Diện tích: $dienTichK3";
        echo $br;
        echo "Diện tích: ".hamKieu03($chieuDai, $chieuRong);

    } catch(Exception $e) {
        echo "Xin lỗi bạn đã gặp phải lỗi " .$e->getMessage();
    }
?>