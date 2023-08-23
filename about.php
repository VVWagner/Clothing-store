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
    <title>About</title>
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon.png">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/about.css">
</head>

<body>
    <div class="container">

        <?php include("include/nav.php") ?>

        <section class="about">

            <h2>О магазине</h2>

            <?php

            $sql = "SELECT * FROM `about`";
            $res = $mysqli->query($sql);

            if ($res->num_rows > 0) {
                while ($resArticle = $res->fetch_assoc()) {

                    ?>
                    <div class="about__block">
                        <div class="about__part">
                            <h3>
                                <?= $resArticle['title'] ?>
                            </h3>
                            <p class="about__text">
                                <?= $resArticle['text'] ?>
                            </p>
                        </div>
                        <img src="/img/about/<?= $resArticle['image'] ?>" alt="">
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