<?php
require_once 'db.php';

$message = '';

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT lastname FROM contacts WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $person = $stmt->fetchColumn();

    $stmt = $pdo->prepare("DELETE FROM contacts WHERE id = ?");
    $stmt->execute([$_GET['id']]);

    $message = "<div class='success'>Запись с фамилией " . htmlspecialchars($person) . " удалена</div>";
}

$contacts = $pdo->query("SELECT * FROM contacts ORDER BY lastname, firstname")->fetchAll(PDO::FETCH_ASSOC);
?>

<?= $message ?>
<div class="div-edit">
<?php foreach ($contacts as $row): ?>
    <div>
        <a href="?menu=delete&id=<?= $row['id'] ?>">
            <?= htmlspecialchars($row['lastname']) ?> <?= mb_substr($row['firstname'], 0, 1) ?>.<?= mb_substr($row['middlename'], 0, 1) ?>.
        </a>
    </div>
<?php endforeach; ?>
</div>
