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
    <section style="background-color: aquamarine;">
            <form action="https://httpbin.org/post" method="post">
                <h2>Форма</h2>
                <label>Имя: <input type="text" id="name" name="name"></label>
                <label>Email: <input type="email" id="email" name="email"></label>
                <fieldset>
                    <legend>Выберите причину обращения:</legend>
                  
                    <label>
                        <input type="radio" name="feedbackType" value="complaint">
                        Жалоба
                    </label><br>
                    
                    <label>
                        <input type="radio" name="feedbackType" value="suggestion">
                        Предложение
                    </label><br>
                    
                    <label>
                        <input type="radio" name="feedbackType" value="gratitude">
                        Благодарность
                    </label><br>
                </fieldset>
                <div>
                    <label for="big_text">Расскажите о себе:</label>
                    <textarea id="big_text" name="big_text" rows="8" cols="40" placeholder="Пишите че хотите"></textarea>
                </div>
                <fieldset>
                    <legend>Выберите как получить ответ:</legend>
                    <label>
                        <input type="checkbox" name="how_response" value="sms">
                        СМС
                    </label>
                    <label>
                        <input type="checkbox" name="how_response" value="email">
                        Email
                    </label>
                </fieldset>
                <div style="display: flex; justify-content: space-between;">
                    <button type="submit">Отправить</button>
                    <a href="respons.php">Перейти на 2 страницу</a>
                </div>
            </form>
        </section>
    </main>
    <footer>
        <p>Милосердов Николай 241-321 Лабораторня 2</p>
        <p><?php echo date("M/Y"); ?></p>
    </footer>
</body>
</html>