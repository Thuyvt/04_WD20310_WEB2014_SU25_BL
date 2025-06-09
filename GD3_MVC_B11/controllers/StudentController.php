<?php
    class StudentController {
        public $studentQuery;

        public function __construct() {
            $this->studentQuery = new StudentQuery();
        }
        public function __destruct(){}

        public function list() {
            $danhSach = $this->studentQuery->all();
            echo "<pre>";
            var_dump($danhSach);
            include "views/student/list.php";
        }
    }
?>