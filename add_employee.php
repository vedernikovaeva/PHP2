<?php
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newEmployee = [
        'code' => $_POST['code'],
        'name' => $_POST['name'],
        'position' => $_POST['position'],
        'salary' => (int)$_POST['salary'],
        'children' => (int)$_POST['children'],
        'experience' => (int)$_POST['experience']
    ];

    $error = validateEmployeeData($newEmployee);
    if ($error) {
        echo $error;
    } else {
        $employees = getEmployees();
        $employees[] = $newEmployee;
        saveEmployees($employees);
        
        echo "Працівника додано успішно!";
        header("Location: index.php");
        exit;
    }
}
?>