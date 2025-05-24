<?php
require_once 'db.php';

function renderTable($sort = 'added', $page = 1) {
    $limit = 10;
    $offset = ($page - 1) * $limit;

    $orderBy = match ($sort) {
        'lastname' => 'lastname ASC',
        'birthdate' => 'birthdate ASC',
        default => 'id ASC'
    };

    $stmt = $GLOBALS['pdo']->prepare("SELECT COUNT(*) FROM contacts");
    $stmt->execute();
    $total = $stmt->fetchColumn();

    $stmt = $GLOBALS['pdo']->prepare("SELECT * FROM contacts ORDER BY $orderBy LIMIT $limit OFFSET $offset");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $html = "<table border='1'><tr>
        <th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Пол</th>
        <th>Дата рождения</th><th>Телефон</th><th>Адрес</th>
        <th>Email</th><th>Комментарий</th></tr>";

    foreach ($rows as $row) {
        $html .= "<tr>";
        foreach ($row as $key => $value) {
            if ($key === 'id') continue;
            $html .= "<td>$value</td>";
        }
        $html .= "</tr>";
    }
    $html .= "</table>";

    $pages = ceil($total / $limit);
    if ($pages > 1) {
        $html .= "<div class='pagination'>";
        for ($i = 1; $i <= $pages; $i++) {
            $html .= "<a href='?menu=view&sort=$sort&page=$i'>$i</a> ";
        }
        $html .= "</div>";
    }

    return $html;
}
?>
