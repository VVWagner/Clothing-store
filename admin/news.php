<?php
session_start();
define('exam', true);
include("include/db_connect.php");
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новости</title>
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon.png">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/news.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include("include/nav.php") ?>
    <div class="container">


        <section class="news">

            <a class="add__btn" href="news-add.php">Добавить новость</a>

            <?php

            $sql = "SELECT * FROM `news`";
            $res = $mysqli->query($sql);

            if ($res->num_rows > 0) {
                while ($resArticle = $res->fetch_assoc()) {

                    ?>
                    <div class="news__block">
                        <p class="news__date">
                            <?= $resArticle['date'] ?>
                        </p>
                        <h3>
                            <?= $resArticle['title'] ?>
                        </h3>
                        <p class="news__text">
                            <?= $resArticle['text'] ?>
                        </p>
                        <a class="more" href="one_news.php?id=<?= $resArticle['id'] ?>">Читать подробнее</a>
                        <ul class="edit__products">
                            <li class="main__item"><a class="main__link main__link__edit"
                                    href="news-edit.php?id=<?= $resArticle['id'] ?>">Редактировать</a></li>
                            <li class="main__item"><a class="main__link main__link__delete"
                                    href="delete/one_news.php?id=<?= $resArticle['id'] ?>">Удалить</a></li>
                        </ul>
                    </div>
                    <?php
                }
            }
            ?>

        </section>

    </div>
    <footer></footer>
</body>

</html>