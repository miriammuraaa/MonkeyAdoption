<?php

session_start();

require 'database.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['id'] = $results['id'];
        header("Location: /MonkeyAdoption");
    } else {
        $message = 'Sorry, those credentials do not match';
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php require 'partials/header.php' ?>

    <?php if (!empty($message)): ?>
        <p>
            <?= $message ?>
        </p>
    <?php endif; ?>

    <div class="caja_global">
        <div class="caja_principal_log">
            <div>
                <h1>Create Account</h1>
                <form action="login.php" method="POST">
                    <input name="email" type="text" placeholder="Enter your email">
                    <input name="password" type="password" placeholder="Enter your Password">
                    <input type="submit" id="sign_in_log" value="SIGN IN">
                </form>
            </div>
        </div>

        <div class="caja_secundaria_log">
            <div>
                <h1>Hello, Friend!</h1>
                <p>Register whith your personal details to use all of site features</p>
                <a href="signup.php">
                    <input type="sign_up_log" value="SIGN UP">
                </a>
            </div>
        </div>
    </div>


</body>

</html>