<?php
session_start();
define('exam', true);
include("include/db_connect.php");

if ($_POST["submit_enter"]) {
    $login = $_POST["input_login"];
    $pass = $_POST["input_pass"];
}

if ($login && $pass) {

    $pass = md5($pass);
    $pass = strrev($pass);
    $pass = strtolower("olgur" . $pass . "9udcxz");

    $query = "SELECT * FROM start WHERE login = '$login' AND pass = '$pass'";
    $result = mysqli_query($mysqli, $query) or die('Error' . mysqli_error($mysqli));

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['auth_start'] = 'yes_auth';
        $_SESSION['auth_start_login'] = $row["login"];

        header("Location: home.php");
    } else {
        $msgerror = "Wrong login or password";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="login">
        <div class="container">
            <div class="row justify__content__center">
                <div class="col-7">
                    <form action="" method="POST">
                        <div class="form-block">
                            <label class="form-label" for="">Login</label>
                            <input type="text" class="form-control" name="input_login">
                        </div>

                        <div class="form-block">
                            <label class="form-label" for="">Password</label>
                            <input type="password" class="form-control" name="input_pass">
                        </div>

                        <div class="form-block">
                            <input type="submit" name="submit_enter" class="form_btn" value="Enter">
                        </div>
                    </form>

                    <?php
                    if ($msgerror) {
                        echo ' <p>' . $msgerror . '</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>