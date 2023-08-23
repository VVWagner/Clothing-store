<?php
session_start();
define('exam', true);
include("../include/db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Товары</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/products.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php include("include/nav.php") ?>

    <div class="products__wrap">
        <a class="add__btn" href="product-add.php">Добавить товар</a>

        <div class="products__list">

            <?php

            $sql = "SELECT * FROM `products`";
            $res = $mysqli->query($sql);

            if ($res->num_rows > 0) {
                while ($resArticle = $res->fetch_assoc()) {
                    ?>
                    <div class="product__item">
                        <div class="img__td" data-th="Изображение">
                            <img class="img__table" src="/img/products/<?= $resArticle['image'] ?>" alt="">
                        </div>
                        <div>
                            <p>
                                <?= $resArticle['title'] ?>
                            </p>
                        </div>
                        <div>
                            <p>Цена: 
                                <?= $resArticle['price'] ?>
                            </p>
                        </div>
                        <div>
                            <p> Артикул: 
                                <?= $resArticle['sku'] ?>
                            </p>
                        </div>
                        <ul class="edit__products">
                            <li class="main__item"><a class="main__link main__link__edit"
                                    href="product-edit.php?id=<?= $resArticle['id'] ?>">Редактировать</a></li>
                            <li class="main__item"><a class="main__link main__link__delete"
                                    href="delete/product.php?id=<?= $resArticle['id'] ?>">Удалить</a></li>
                        </ul>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <footer></footer>
</body>

</html>