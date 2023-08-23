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
    <title>Womazing</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon.png">
</head>

<body>
    <div class="prime">
    <div class="triangle"></div>
        <div class="container">

            <?php include("include/nav.php") ?>

            <section class="present">
                <div class="present__main">
                    <h1>Новые поступления в этом сезоне</h1>
                    <p>Утонченные сочетания и светлые оттенки - вот то, что вы искали в этом сезоне. Время
                        исследовать.</p>
                    <div class="present__btn">
                        <a class="market_link" href="/products.php">
                            <button>
                                <div class="wrap__btn"><img class="arrow" src="/img/icons/arrows.png" alt=""></div>
                                <div class="present__btn__text">
                                    <p class="main__btn__text">Открыть магазин</p>
                                </div>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="present__images">
                    <img src="/img/main_photo.png" alt="photo">
                </div>
            </section>

            <section class="shop shop__main">
                <h2>Новая коллекция</h2>
                <div class="shop_products">
                    <?php

                    $sql = "SELECT * FROM `products` ORDER BY id DESC LIMIT 3";
                    $res = $mysqli->query($sql);

                    if ($res->num_rows > 0) {
                        while ($resArticle = $res->fetch_assoc()) {
                            ?>
                            <div class="shop__product__main">
                                <a href="one_product.php?id=<?= $resArticle['id'] ?>"><img
                                        src="/img/products/<?= $resArticle['image'] ?>" alt="">
                                    <div class="shop__product__desc">
                                        <h3>
                                            <?= $resArticle['title'] ?>
                                        </h3>
                                        <p>
                                            <?= $resArticle['price'] ?>
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="shop__btn">
                    <a class="market_link" href="products.php">
                        <button class="btn_main">
                            <p>Открыть магазин</p>
                        </button>
                    </a>
                </div>
            </section>

            <section class="info">
                <h2>Что для нас важно</h2>
                <div class="info__cards">
                    <div class="info__card"><img src="/img/icons/quality.svg" alt="">
                        <div class="info__card__title">Качество</div>
                        <div class="info__card__subtitle">Наши профессионалы работают на лучшем оборудовании для пошива
                            одежды беспрецедентного качества</div>
                    </div>
                    <div class="info__card"><img src="/img/icons/tool.svg" alt="">
                        <div class="info__card__title">Скорость</div>
                        <div class="info__card__subtitle">Благодаря отлаженной системе в Womazing мы можем отшивать до
                            20-ти единиц продукции в наших собственных цехах</div>
                    </div>
                    <div class="info__card"><img src="/img/icons/hand.svg" alt="">
                        <div class="info__card__title">Ответственность</div>
                        <div class="info__card__subtitle">Мы заботимся о людях и планете. Безотходное производство и
                            комфортные условия труда - все это Womazing</div>
                    </div>
                </div>
            </section>

            <section class="team">
                <h2>Команда мечты Womazing</h2>
                <div class="team__block">
                    <div class="team__img"><img class="img__team" src="/img/team.png" alt="photo"></div>
                    <div class="team__text">
                        <div class="team__text__title">Для каждой</div>
                        <div class="team__text__subtitle">Каждая девушка уникальна. Однако, мы схожи в миллионе
                            мелочей.<br><br>
                            Womazing ищет эти мелочи и создает прекрасные вещи, которые выгодно подчеркивают достоинства
                            каждой девушки.</div>
                        <a href="/about.php">Подробнее о бренде</a>
                    </div>
                </div>
            </section>

        </div>
        <?php include("include/footer.php") ?>
    </div>
</body>

</html>