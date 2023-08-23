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

    $sql = "SELECT * FROM `products` WHERE `id` = '$id'";
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
    <link rel="stylesheet" href="css/products.css">
    <link rel="stylesheet" href="css/one_product.css">
</head>

<body>
    <div class="container">

        <?php include("include/nav.php") ?>

        <h2>
            <?= $resPost['title'] ?>
        </h2>
        <section class="one__product">
            <?php

            $sql = "SELECT * FROM `products` WHERE id='$id'";
            $res = $mysqli->query($sql);

            if ($res->num_rows > 0) {
                while ($resArticle = $res->fetch_assoc()) {
                    ?>
                    <div class="shop__product">
                        <img src="/img/products/<?= $resArticle['image'] ?>" alt="">
                    </div>
                    <div class="product__desc">

                        <div class="product__price">
                            <?= $resArticle['price'] ?>
                        </div>
                        <div class="product__size">
                            <p class="prod__title">Выберите размер</p>

                            <div class="size__wrap">
                                <div class="size_radio">
                                    <input class="size" id="size-1" type="radio" name="size">
                                    <label class="size-1" for="size-1"></label>
                                </div>

                                <div class="size_radio">
                                    <input class="size" id="size-2" type="radio" name="size">
                                    <label class="size-2" for="size-2"></label>
                                </div>

                                <div class="size_radio">
                                    <input class="size" id="size-3" type="radio" name="size" checked>
                                    <label class="size-3" for="size-3"></label>
                                </div>

                                <div class="size_radio">
                                    <input class="size" id="size-4" type="radio" name="size">
                                    <label class="size-4" for="size-4"></label>
                                </div>

                                <div class="size_radio">
                                    <input class="size" id="size-5" type="radio" name="size">
                                    <label class="size-5" for="size-5"></label>
                                </div>
                            </div>
                        </div>

                        <div class="product__color">
                            <p class="prod__title">Выберите цвет</p>

                            <div class="color__wrap">
                                <div class="form_radio">
                                    <input class="color" id="radio-1" type="radio" name="radio">
                                    <label class="radio-1" for="radio-1"></label>
                                </div>

                                <div class="form_radio">
                                    <input class="color" id="radio-2" type="radio" name="radio" checked>
                                    <label class="radio-2" for="radio-2"></label>
                                </div>

                                <div class="form_radio">
                                    <input class="color" id="radio-3" type="radio" name="radio">
                                    <label class="radio-3" for="radio-3"></label>
                                </div>

                                <div class="form_radio">
                                    <input class="color" id="radio-4" type="radio" name="radio">
                                    <label class="radio-4" for="radio-4"></label>
                                </div>
                            </div>
                        </div>
                        <div class="product__buy">
                            <span id="raz">
                                <input type="number" value="1" min="1">
                                <span onclick="this.previousElementSibling.stepUp()"></span>
                                <span onclick="this.previousElementSibling.previousElementSibling.stepDown()"></span>
                            </span>
                            <button>
                                <div class="prooduct__btn__text">
                                    <p>Добавить в корзину</p>
                                </div>
                            </button>
                        </div>
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