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
<html>

<head>
    <meta charset="utf-8">
    <title>SignUp</title>
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
        <div class="caja_secundaria">
            <div>
                <h1>Welcome Back!</h1>
                <p>Enter your personal details to use all of site features</p>
                <a href="login.php">
                    <input type="sign_in" value="SIGN IN">
                </a>
            </div>
        </div>

        <div class="caja_principal">
            <div>
                <h1>Create Account</h1>
                <form action="signup.php" method="post">
                    <input name="email" type="text" placeholder="Enter your email">
                    <input name="password" type="password" placeholder="Enter your Password">
                    <input name="confirm_password" type="password" placeholder="Confirm Password">
                    <input type="submit" id="sign_up" value="SIGN UP">
                </form>
            </div>
        </div>
    </div>

</body>

</html>