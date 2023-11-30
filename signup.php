<?php

require 'database.php';

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (id, email, password) VALUES (NULL, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        $message = 'Successfully created new user';
    } else {
        $message = 'Sorry there must have been an issue creating your account';
    }
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
</head>
<body>

    <div class="main">
        <div class="container a-container" id="a-container">
            <form id="a-form" class="form" method="" action="">
                <h2 class="form_title title">Create Account</h2>
                <div class="form__icons">
                    <img class="form__icon" src="data:image/svg+xml;base64, ... " alt="">
                    <img class="form__icon" src="data:image/svg+xml;base64, ... " alt="">
                </div>
                <span class="form__span">or use email for registration</span>
                <input class="form__input" type="text" placeholder="Name">
                <input class="form__input" type="text" placeholder="Email">
                <input class="form__input" type="password" placeholder="Password">
                <button class="form__button button submit">SIGN UP</button>
            </form>
        </div>

        <div class="container b-container" id="b-container">
            <form id="b-form" class="form" method="" action="">
                <h2 class="form_title title">Sign in to Website</h2>
                <div class="form__icons">
                    <img class="form__icon" src="data:image/svg+xml;base64, ... " alt="">
                    <img class="form__icon" src="data:image/svg+xml;base64, ... " alt="">
                </div>
                <input class="form__input" type="text" placeholder="Email">
                <input class="form__input" type="password" placeholder="Password">
                <button class="form__button button submit">SIGN IN</button>
            </form>
        </div>
    </div>

</body>
</html>