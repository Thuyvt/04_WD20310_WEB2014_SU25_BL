<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'         => (new HomeController)->index(),
    'student-list' => (new StudentController)->list(),
    // Chưa có hàm thì khai báo ''
    'student-create' => (new StudentController)->create(),
};