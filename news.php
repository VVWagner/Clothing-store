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
    <title>News</title>
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon.png">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/news.css">
</head>

<body>
    <div class="container">

        <?php include("include/nav.php") ?>

        <section class="news">

            <h2>Новости</h2>

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
                    </div>
                    <?php
                }
            }
            ?>

        </section>

    </div>
    <?php include("include/footer.php") ?>
</body>

</html>