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
    <title>Contacts</title>
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon.png">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contacts.css">
</head>

<body>
    <div class="container">

        <?php include("include/nav.php") ?>

        <section class="contacts">
            <h2>Контакты</h2>
            <div class="map">
                <map>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2670.049685719184!2d37.622104303902745!3d55.754416183496886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54a598b4552fd%3A0xd2f2265b70fe6a05!2z0JPQo9Cc!5e0!3m2!1sru!2sam!4v1682175850987!5m2!1sru!2sam"
                        width="1100" height="340" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </map>
            </div>

            <div class="communication">
                <div class="communication__phone">
                    <h3>Телефон</h3>
                    <p>+7 (445) 001-99-11</p>
                </div>
                <div class="communication__email">
                    <h3>E-mail</h3>
                    <p>hello@womazing.com</p>
                </div>
                <div class="communication__address">
                    <h3>Адрес</h3>
                    <p>г. Москва, Красная площадь, 3 (ГУМ)</p>
                </div>
            </div>

            <h2 class="commun-title">Связаться с нами</h2>

            <form method="POST">

                <div class="form-group">
                    <input type="text" placeholder="Имя">
                </div>

                <div class="form-group">
                    <input type="tel" placeholder="Телефон">
                </div>

                <div class="form-group">
                    <input type="email" placeholder="E-mail">
                </div>

                <div class="form-group">
                    <textarea cols="30" rows="10" placeholder="Сообщение"></textarea>
                </div>

                <a class="button">Отправить</a>
            </form>
    </div>
    </section>

    </div>
    <?php include("include/footer.php") ?>
</body>

</html>