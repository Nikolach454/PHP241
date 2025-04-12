<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Милосердов Николай 241-321 Лабораторня 2</title>
</head>
<body style="background-color: cadetblue;">
    <header style="display: flex; justify-content: space-between;">
        <img src="../../images/1000011505-photoaidcom-invert.jpg" alt="Лучший вуз в Политехе" style="width: 30%; height: 30%;">
        <h1>4.1. Домашняя работа: Feedback Form. Время выполнения - 3 часа</h1>
    </header>
    <main>
        <?php 
            $result = get_headers("https://httpbin.org/post");
            echo "<textarea>";
                print_r($result);
            echo "</textarea>";
        ?>
    </main>
    <footer>
        <p>Милосердов Николай 241-321 Лабораторня 2</p>
        <p><?php echo date("M/Y"); ?></p>
    </footer>
</body>
</html>