<?php
    class MajorQuery extends BaseModel {
        public function all () {
            try {
                $sql = "SELECT * from major";
                $data = $this->pdo->query($sql)->fetchAll();
                $danhSachMajor = [];
                foreach($data as $value) {
                    $object = new Major();
                    $object->id = $value["id"];
                    $object->name = $value["name"];
                    $danhSachMajor[] = $object;
                }
                return $danhSachMajor;
            } catch(Exeption $error) {
                echo "Lỗi: " . $error->getMessage();
            }
        }
    }
?>