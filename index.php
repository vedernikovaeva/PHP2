<?php
require 'functions.php';
$employees = getEmployees();

$filteredEmployees = filterEmployees($employees, $_GET['position'] ?? null, $_GET['max_children'] ?? null);
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Список працівників</title>
</head>
<body>
    <h2>Список працівників</h2>
    <form method="get">
        <label for="position">Посада:</label>
        <input type="text" name="position" value="<?= htmlspecialchars($_GET['position'] ?? '') ?>">
        <label for="max_children">Кількість дітей (не більше):</label>
        <input type="number" name="max_children" value="<?= htmlspecialchars($_GET['max_children'] ?? '') ?>">
        <button type="submit">Фільтрувати</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>Код</th>
                <th>ПІБ</th>
                <th>Посада</th>
                <th>Заробітна плата</th>
                <th>Кількість дітей</th>
                <th>Стаж</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filteredEmployees as $employee): ?>
                <tr>
                    <td><?= $employee['code']; ?></td>
                    <td><?= $employee['name']; ?></td>
                    <td><?= $employee['position']; ?></td>
                    <td><?= $employee['salary']; ?></td>
                    <td><?= $employee['children']; ?></td>
                    <td><?= $employee['experience']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Додати нового працівника</h2>
    <form method="post" action="add_employee.php">
        <label for="code">Код:</label>
        <input type="number" name="code" required>
        <br/>
        <label for="name">ПІБ:</label>
        <input type="text" name="name" required>
        <br/>
        <label for="position">Посада:</label>
        <input type="text" name="position" required>
        <br/>
        <label for="salary">Заробітна плата:</label>
        <input type="number" name="salary" required>
        <br/>
        <label for="children">Кількість дітей:</label>
        <input type="number" name="children">
        <br/>
        <label for="experience">Стаж:</label>
        <input type="number" name="experience">
        <br/>
        <button type="submit">Додати</button>
    </form>
</body>
</html>