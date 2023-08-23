<?php
$link = mysqli_connect($db_host, $db_user, $db_password, $db_database)
    or die("Ошибка " . mysqli_error($link));
$error_img = array();

if ($_FILES['upload_image']['error'] > 0) {
    //в зависимости от номера ошибки выводим соответствующее сообщение
    switch ($_FILES['upload_image']['error']) {
        case 1:
            $error_img[] = 'Размер файла превышает допустимое значение UPLOAD_MAX_FILE_SIZE';
            break;
        case 2:
            $error_img[] = 'Размер файла превышает допустимое значение MAX_FILE_SIZE';
            break;
        case 3:
            $error_img[] = 'Не удалось загрузить часть файла';
            break;
        case 4:
            $error_img[] = 'Файл не был загружен';
            break;
        case 6:
            $error_img[] = 'Отсутствует временная папка.';
            break;
        case 7:
            $error_img[] = 'Не удалось записать файл на диск.';
            break;
        case 8:
            $error_img[] = 'PHP-расширение остановило загрузку файла.';
            break;
    }
} else {
    //проверяем расширения
    if ($_FILES['upload_image']['type'] == 'image/jpeg' || $_FILES['upload_image']['type'] == 'image/jpg' || $_FILES['upload_image']['type'] == 'image/png') {

        $imgext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['upload_image']['name']));

        //папка для загрузки
        $uploaddir = '../img/news/';
        //новое сгенерированное имя файла
        $newfilename = $_POST["id"] . '' . $id . rand(10, 100) . '.' . $imgext;
        //путь к файлу (папка.файл)
        $uploadfile = $uploaddir . $newfilename;
        //загружаем файл move_uploaded_file
        if (move_uploaded_file($_FILES['upload_image']['tmp_name'], $uploadfile)) {
            $update = mysqli_query($link, "UPDATE news SET image='$newfilename' WHERE id = '$id'");
        } else {
            $error_img[] = "Ошибка загрузки файла.";
        }
    } else {
        $error_img[] = 'Допустимые расширения: jpeg, jpg, png';
    }

    $error_img;
}
?>