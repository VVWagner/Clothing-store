<?php
session_start();
define('exam', true);
include("include/db_connect.php");
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php

    $sql = "SELECT * FROM `news` WHERE `id` = '$id'";
    $res = $mysqli->query($sql);

    if ($res->num_rows === 1) {

        $resPost = $res->fetch_assoc()
            ?>

        <title>
            <?= $resPost['title'] ?>
        </title>

    <?php } ?>
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon.png">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/one_news.css">
</head>

<body>
    <div class="container">

        <?php include("include/nav.php") ?>

        <section class="news">
            <?php

            $sql = "SELECT * FROM `news` WHERE id='$id'";
            $res = $mysqli->query($sql);

            if ($res->num_rows > 0) {
                while ($resArticle = $res->fetch_assoc()) {
                    ?>
                    <div class="news__block">
                        <h2>
                            <?= $resPost['title'] ?>
                        </h2>
                        <div class="add_img">
                            <img src="/img/news/<?= $resArticle['image'] ?>" alt="">
                        </div>
                        <p class="news__text">
                            <?= $resArticle['text'] ?>

                        </p>
                        <div class="news__footer">
                        <p class="news__author">Автор: <?= $resArticle['author'] ?></p>
                        <p class="news__date">
                            <?= date("d.m.Y", strtotime($resArticle['date']));
                            ?>
                        </p>
                        </div>
                    </div>

                    <?php
                }
            }
            ?>
        </section>

    </div>
</body>

</html>