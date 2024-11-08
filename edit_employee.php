<?php
require 'functions.php';

$employees = getEmployees();
$employee = $employees[0]; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($employees as &$emp) {
        if ($emp['code'] == $_POST['code']) {
            $emp = [
        'code' => $_POST['code'],
        'name' => $_POST['name'],
        'position' => $_POST['position'],
        'salary' => (int)$_POST['salary'],
        'children' => (int)$_POST['children'],
        'experience' => (int)$_POST['experience']
    ];
    $error = validateEmployeeData($emp);
    if ($error) {
        echo $error;
        exit;
    }
    break;

    }
}

saveEmployees($employees);
    echo "Дані працівника успішно оновлено!";
    header("Location: index.php");
    exit;
}
?>

