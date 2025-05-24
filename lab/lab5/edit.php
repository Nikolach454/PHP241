<?php
require_once 'db.php';

$id = $_GET['id'] ?? null;
$message = '';

$contacts = $pdo->query("SELECT * FROM contacts ORDER BY lastname, firstname")->fetchAll(PDO::FETCH_ASSOC);

$current = null;
if ($id) {
    foreach ($contacts as $row) {
        if ($row['id'] == $id) {
            $current = $row;
            break;
        }
    }
}
if (!$current && count($contacts)) {
    $current = $contacts[0];
    $id = $current['id'];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE contacts SET
        lastname = ?, firstname = ?, middlename = ?, gender = ?, birthdate = ?,
        phone = ?, address = ?, email = ?, comment = ? WHERE id = ?");
    $success = $stmt->execute([
        $_POST['lastname'], $_POST['firstname'], $_POST['middlename'],
        $_POST['gender'], $_POST['birthdate'], $_POST['phone'],
        $_POST['address'], $_POST['email'], $_POST['comment'], $_POST['id']
    ]);

    $message = $success
        ? "<div class='success'>Запись обновлена</div>"
        : "<div class='error'>Ошибка обновления записи</div>";

    header("Location: ?menu=edit&id=" . $_POST['id']);
    exit;
}
?>

<div class="div-edit">
<?php foreach ($contacts as $row): ?>
    <div class="<?= $row['id'] == $id ? 'currentRow' : '' ?>">
        <a href="?menu=edit&id=<?= $row['id'] ?>">
            <?= htmlspecialchars($row['lastname'] . ' ' . $row['firstname']) ?>
        </a>
    </div>
<?php endforeach; ?>
</div>

<?= $message ?>
<?php if ($current): ?>
<form method="post" class="add">
    <div class="column">
        <input type="hidden" name="id" value="<?= $current['id'] ?>">
        <label>Фамилия: <input name="lastname" value="<?= htmlspecialchars($current['lastname']) ?>"></label>
        <label>Имя: <input name="firstname" value="<?= htmlspecialchars($current['firstname']) ?>"></label>
        <label>Отчество: <input name="middlename" value="<?= htmlspecialchars($current['middlename']) ?>"></label>
        <label>Пол:
            <select name="gender">
                <option <?= $current['gender'] === 'Мужской' ? 'selected' : '' ?>>Мужской</option>
                <option <?= $current['gender'] === 'Женский' ? 'selected' : '' ?>>Женский</option>
            </select>
        </label>
        <label>Дата рождения: <input type="date" name="birthdate" value="<?= $current['birthdate'] ?>"></label>
        <label>Телефон: <input name="phone" value="<?= htmlspecialchars($current['phone']) ?>"></label>
        <label>Адрес: <input name="address" value="<?= htmlspecialchars($current['address']) ?>"></label>
        <label>Email: <input name="email" value="<?= htmlspecialchars($current['email']) ?>"></label>
        <label>Комментарий: <textarea name="comment"><?= htmlspecialchars($current['comment']) ?></textarea></label>
        <button class="form-btn" type="submit">Обновить</button>
    </div>
</form>
<?php endif; ?>