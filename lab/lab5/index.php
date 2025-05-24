<?php
$menu = $_GET['menu'] ?? 'view';
$sort = $_GET['sort'] ?? 'added';
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

require_once 'menu.php';



echo "<!DOCTYPE html><html><head>
    <meta charset='utf-8'>
    <title>Записная книжка</title>
    <link rel='stylesheet' href='style.css'>
</head><body>";

echo getMenuHTML($menu, $sort);
echo "<main>";

switch ($menu) {
    case 'add':
        require 'add.php';
        break;
    case 'edit':
        require 'edit.php';
        break;
    case 'delete':
        require 'delete.php';
        break;
    default:
        require 'viewer.php';
        echo renderTable($sort, $page);
}

echo "</main><footer></footer></body></html>";
?>