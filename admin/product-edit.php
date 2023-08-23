<?php
session_start();
define('exam', true);
include("include/db_connect.php");
$id = $_GET['id'];

$action = $_GET["action"];
if (isset($action)) {
  switch ($action) {
    case 'delete':
      if (file_exists("../img/products/" . $_GET["image"])) {
        unlink("../img/products/" . $_GET["image"]);
        $query = "UPDATE products SET image = NULL WHERE id = '$id'";
        $result = mysqli_query($mysqli, $query) or die("Ошибка" . mysqli_error($mysqli));
      }
      break;
  }
}

if ($_POST["submit_add"]) {
  $error = array();
  if (count($error)) {
    $_SESSION['message'] = "<p id='form-error'>" . implode('<br/>', $error) . "</p>";
  } else {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $sku = $_POST['sku'];


    $querynew = "title='$title', price='$price', sku='$sku'";

    $update = "UPDATE products SET $querynew WHERE id = '$id'";

    $result = mysqli_query($mysqli, $update) or die("Ошибка" . mysqli_error($mysqli));

    if (empty($_POST["upload_image"])) {
      include("action/prod_image.php");
      unset($_POST["upload_image"]);
    }

    $id = mysqli_insert_id($mysqli);
  }
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Edit</title>
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
        <h2 class="main_head">Редактировать товар</h2>
      </div>

      <?php

      $id = $_GET['id'];

      $sql = "SELECT * FROM `products` WHERE `id` = '$id'";
      $res = $mysqli->query($sql);

      if ($res->num_rows === 1) {
        $resPost = $res->fetch_assoc()
          ?>

        <div class="row">
          <div class="form_add">
            <form enctype="multipart/form-data" method="post">
              <div class="form-block">
                <label for="" class="form-label">Название</label>
                <input type="text" class="form-control" value="<?= $resPost['title'] ?>" name="title">
              </div>

              <div class="form-block">
                <label for="" class="form-label">Цена</label>
                <input type="text" class="form-control" value="<?= $resPost['price'] ?>" name="price">
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

              <?php

              if ((strlen($resPost["image"]) > 0) && (file_exists("../img/products/" . $resPost["image"]))) {
                $img_pathh = '../img/products/' . $resPost["image"];
                echo '
                    <label class="form-label" >Картинка</label>
                    <div id="baseimg">
                        <img src="' . $img_pathh . '" /> <br>
                        <a class="btn" href="product-edit.php?id=' . $resPost["id"] . '&image=' . $resPost["image"] . '&action=delete" >Удалить</a>
                    </div>';
              } else {
                echo '
                    <label class="form-label" >Добавить файл</label>
                    <div id="baseimg-upload">
                        <input type="hidden" class="form-control" name="MAX_FILE_SIZE" value="7340032">
                        <input type="file" class="form-control" name="upload_image">
                    </div> <br>';
              }
              ?>

              <br><br>
              <input type="submit" id="submit_form" name="submit_add" class="form_btn" value="Добавить">

            </form>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>

</body>

</html>