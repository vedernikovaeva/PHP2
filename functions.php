<?php
const DATA_FILE = 'employees.json';

function getEmployees() {
    if (file_exists(DATA_FILE)) {
        $data = file_get_contents(DATA_FILE);
        return json_decode($data, true);
    }
    return [
        [
            'code' => 1,
            'name' => 'Іван Іваненко',
            'position' => 'Бухгалтер',
            'salary' => 15000,
            'children' => 2,
            'experience' => 5
        ],
    
        [ 
            'code' => 2,
            'name' => 'Марія Петренко',
            'position' => 'Старший бухгалтер',
            'salary' => 20000,
            'children' => 1,
            'experience' => 8
        ],
        [
            'code' => 3,
            'name' => 'Олексій Коваленко',
            'position' => 'Менеджер',
            'salary' => 25000,
            'childrem' => 0,
            'experience' => 5
        ],
        [
            'code' => 4,
            'name' => 'Вікторія Іванова',
            'position' => 'Босс',
            'salary' => 300000,
            'children' => 2,
            'experience' => 10
        ],
        [
            'code' => 5,
            'name' => 'Олексій Шевченко',
            'position' => 'Бухгалтер',
            'salary' => 10000,
            'children' => 0,
            'experience' => 1
        ],
        [
            'code' => 6,
            'name' => 'Микола Роман',
            'position' => 'Менеджер',
            'salary' => 20000,
            'children' => 1,
            'experience' => 2
        ]
        ];
    }

function saveEmployees($employees) {
        $data = json_encode($employees, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents(DATA_FILE, $data);
}   

function filterEmployees($employees, $position = null, $maxChildren = null) {
    return array_filter($employees, function($employee) use ($position, $maxChildren) {
        $positionMatch = !$position || $employee['position'] === $position;
        $childrenMatch = !$maxChildren || $employee['children'] <= $maxChildren;
        return $positionMatch && $childrenMatch;
    });
}

function validateEmployeeData($employee) {
    if (empty($employee['name'])) {
        return "ПІБ не може бути порожнім.";
    }
    if (!is_numeric($employee['salary']) || $employee['salary'] < 0) {
        return "Заробітна плата повинна бути невід'ємним числом.";
    }
    return null;
}
?>