<?php
    class StudentController {
        public $studentQuery;
        public $majorQuery;

        public function __construct() {
            $this->studentQuery = new StudentQuery();
            $this->majorQuery = new MajorQuery();
        }
        public function __destruct(){}

        public function list() {
            $danhSach = $this->studentQuery->all();
            // echo "<pre>";
            // var_dump($danhSach);
            include "views/student/list.php";
        }

        public function create() {
            $danhSachMajor = $this->majorQuery->all();
            $student = new Student();
            // echo "<pre>";
            // var_dump($_POST);
            // die();
            if (isset($_POST["submitForm"])) {
                $student->name = trim($_POST["name"]);
                $student->major_id = trim($_POST["major_id"]);
                $student->account = trim($_POST["account"]);
                $student->date_of_birth = trim($_POST["date_of_birth"]);
                // echo "<pre>";
                // var_dump($_FILES);
                // die();
                if(isset($_FILES["file_upload"]) && $_FILES["file_upload"]["size"] >0){
                    $student->avatar = upload_file('student', $_FILES["file_upload"]);
                }
                $data = $this->studentQuery->create($student);
                if ($data == 1) {
                    header("Location: ?action=student-list");
                }
            }
            include "views/student/create.php";
        }
    }
?>