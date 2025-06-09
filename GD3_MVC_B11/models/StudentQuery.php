<?php
    class StudentQuery extends BaseModel {
        // Hàm xử lý logic lấy danh sách
        public function all() {
            try {
                $sql = "SELECT stu.*, ma.name as major_name
                 FROM student as stu
                 JOIN major as ma
                 ON stu.major_id = ma.id";
                $data = $this->pdo->query($sql)->fetchAll();
                $danhSach = [];
                foreach($data as $value) {
                    $object = new Student();
                    $object->id = $value["id"];
                    $object->name = $value["name"];
                    $object->major_id = $value["major_id"];
                    $object->account = $value["account"];
                    $object->date_of_birth = $value["date_of_birth"];
                    $object->major_name = $value["major_name"];
                    $danhSach[] = $object;
                }
                return $danhSach;
            } catch(Exception $error) {
                echo "Lỗi: " . $error->getMessage();
            }
        }
        // Hàm xử lý logic xóa

    }
?>