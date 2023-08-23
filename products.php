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
    <title>Market</title>
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon.png">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/products.css">
</head>

<body>
    <div class="container">

        <?php include("include/nav.php") ?>

        <h2>Магазин</h2>
        <section class="shop">
            <?php

            $page = 1; // текущая страница
            $kol = 3; //количество записей для вывода
            
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else
                $page = 1;

            $sql1 = "SELECT COUNT(*) FROM `products`";
            $res1 = $mysqli->query($sql1);
            $row = mysqli_fetch_row($res1);
            $total = $row[0]; // всего записей
            
            $str_pag = ceil($total / $kol);

            $art = ($page * $kol) - $kol; // определяем, с какой записи нам выводить
            $sql = "SELECT * FROM `products` LIMIT $art,$kol";
            $res = $mysqli->query($sql);

            if ($res->num_rows > 0) {
                while ($resArticle = $res->fetch_assoc()) {
                    ?>
                    <div class="shop__product">
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

            echo "<div class='pagin'>";

            for ($i = 1; $i <= $str_pag; $i++) {
                echo "<a href=products.php?page=" . $i . "> " . $i . " </a>";
            }
            echo "</div>";
            ?>

        </section>

    </div>
    <?php include("include/footer.php") ?>
</body>

</html>