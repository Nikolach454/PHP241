<?php
require_once 'db.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO contacts (lastname, firstname, middlename, gender, birthdate, phone, address, email, comment)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $success = $stmt->execute([
        $_POST['lastname'], $_POST['firstname'], $_POST['middlename'],
        $_POST['gender'], $_POST['birthdate'], $_POST['phone'],
        $_POST['address'], $_POST['email'], $_POST['comment']
    ]);

    $message = $success
        ? "<div class='success'>Запись добавлена</div>"
        : "<div class='error'>Ошибка: запись не добавлена</div>";
}
?>

<?= $message ?>
<form method="post" class="add">
    <div class="column">
        <label>Фамилия: <input name="lastname" required></label>
        <label>Имя: <input name="firstname" required></label>
        <label>Отчество: <input name="middlename"></label>
        <label>Пол:
            <select name="gender">
                <option>Мужской</option>
                <option>Женский</option>
            </select>
        </label>
        <label>Дата рождения: <input type="date" name="birthdate"></label>
        <label>Телефон: <input name="phone"></label>
        <label>Адрес: <input name="address"></label>
        <label>Email: <input type="email" name="email"></label>
        <label>Комментарий: <textarea name="comment"></textarea></label>
        <button class="form-btn" type="submit">Добавить</button>
    </div>
</form>
