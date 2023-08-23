<?php
session_start();
define('exam', true);
include("include/db_connect.php");

if ($_POST["submit_add"]) {
    $error = array();
    if (count($error)) {
        $_SESSION['message'] = "<p id='form-error'>" . implode('<br/>', $error) . "</p>";
    } else {
        $title = $_POST['title'];
        $price = $_POST['price'];
        $sku = $_POST['sku'];

        $query = "INSERT INTO products (title, price, sku) VALUES ('" . mysqli_real_escape_string($mysqli, $title) . "',
        '" . mysqli_real_escape_string($mysqli, $price) . "',
        '" . mysqli_real_escape_string($mysqli, $sku) . "'
        )";

        $result = mysqli_query($mysqli, $query) or die("Ошибка" . mysqli_error($mysqli));

        $id = mysqli_insert_id($mysqli);

        if (empty($_POST["upload_image"])) {
            include("action/prod_image.php");
            unset($_POST["upload_image"]);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить товар</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/products.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include("include/nav.php") ?>

    <?php $error ?>
    <?php $error_img ?>

    <section class="main">
        <div class="container">
            <div class="col-12">
                <h2 class="main_head">Добавить товар</h2>
            </div>

            <div class="row">
                <div class="form_add">
                    <form enctype="multipart/form-data" method="post">
                        <div class="form-block">
                            <label for="" class="form-label">Название</label>
                            <input type="text" class="form-control" name="title">
                        </div>

                        <div class="form-block">
                            <label for="" class="form-label">Цена</label>
                            <input type="text" class="form-control" name="price">
                        </div>

                        <div class="form-block">
                            <label for="" class="form-label">Артикул</label>
                            <input type="text" class="form-control" name="sku">
                        </div>

                        <div class="form-block">
                            <label for="" class="form-label">Изображение</label>
                            <div id="img-load">
                                <input type="hidden" class="form-control" name="MAX_FILE_SIZE" value="7340032">
                                <input type="file" class="form-control add_img" name="upload_image">
                            </div>
                        </div>

                        <input type="submit" id="submit_form" name="submit_add" class="form_btn" value="Добавить">

                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>