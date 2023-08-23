<?php
session_start();
define('exam', true);
include("../include/db_connect.php");
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель администратора</title>

    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon.png">
</head>

<body>

    <?php include("include/nav.php") ?>

    <div class="container">

        <div class="admin_wrap">
            <h2>Последние добавленные товары:</h2>
            <div class="admin_products">
                <?php

                $sql = "SELECT * FROM `products` ORDER BY id DESC LIMIT 3";
                $res = $mysqli->query($sql);

                if ($res->num_rows > 0) {
                    while ($resArticle = $res->fetch_assoc()) {

                        ?>

                        <div class="main__block">
                            <div class="main__border">
                                <img class="main__img" src="/img/products/<?= $resArticle['image'] ?>" alt="">
                                <p class="main__title">
                                    <?= $resArticle['title'] ?>
                                </p>
                                <p>
                                <?= $resArticle['price'] ?>
                            </p>
                            </div>
                        </div>


                        <?php
                    }
                }
                ?>
            </div>
        </div>

        <div class="admin_wrap">
            <h2>Последние добавленные новости:</h2>
            <div class="admin_products">
                <?php

                $sql = "SELECT * FROM `news` ORDER BY id DESC LIMIT 3";
                $res = $mysqli->query($sql);

                if ($res->num_rows > 0) {
                    while ($resArticle = $res->fetch_assoc()) {

                        ?>

                        <div class="admin__news">
                            <div class="main__border">
                                <img class="main__img" src="/img/news/<?= $resArticle['image'] ?>" alt="">

                                <div class="news__desc">
                                    <p class="admin__title__news">
                                        <?= $resArticle['title'] ?>
                                    </p>
                                    <div class="news__footer">
                                        <p class="news__author">Автор:
                                            <?= $resArticle['author'] ?>
                                        </p>
                                        <p class="news__date">
                                            <?= date("d.m.Y", strtotime($resArticle['date']));
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <footer></footer>
</body>

</html>