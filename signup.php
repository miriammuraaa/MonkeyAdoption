<?php

require 'database.php';

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['phone'])) {
    $sql = "INSERT INTO users (email, password, name, phone) VALUES (:email, :password, :name, :phone)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':phone', $_POST['phone']);

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

    <h1>SignUp</h1>
    <span>or <a href="login.php">Login</a></span>

    <form action="signup.php" method="POST">
        <input name="name" type="text" placeholder="Enter your name">
        <input name="email" type="text" placeholder="Enter your email">
        <input name="phone" type="text" placeholder="Enter your phone number">
        <input name="password" type="password" placeholder="Enter your Password">
        <input name="confirm_password" type="password" placeholder="Confirm Password">
        <input type="submit" value="Submit">
    </form>

</body>

</html>
