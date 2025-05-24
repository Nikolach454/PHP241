<?php
function getMenuHTML($active = 'view', $sort = 'added') {
    $menu = [
        'view' => 'Просмотр',
        'add' => 'Добавление записи',
        'edit' => 'Редактирование записи',
        'delete' => 'Удаление записи',
    ];

    $html = '<header>';
    foreach ($menu as $key => $label) {
        $class = $key === $active ? 'select' : '';
        $html .= "<a href='?menu=$key' class='$class'>$label</a>";
    }
    $html .= '</header>';

    if ($active === 'view') {
        $sorts = ['added' => 'По добавлению', 'lastname' => 'По фамилии', 'birthdate' => 'По дате рождения'];
        $html .= '<div class="submenu">';
        foreach ($sorts as $key => $label) {
            $class = $key === $sort ? 'select' : '';
            $html .= "<a href='?menu=view&sort=$key' class='$class'>$label</a>";
        }
        $html .= '</div>';
    }

    return $html;
}
?>
