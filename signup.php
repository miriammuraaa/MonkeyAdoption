<?php

require 'database.php';

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['first_name']) && !empty($_POST['last_name'])) {
    $sql = "INSERT INTO users (first_name, last_name, email, password_hash) VALUES (:first_name, :last_name, :email, :password)";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':first_name', $_POST['first_name']);
    $stmt->bindParam(':last_name', $_POST['last_name']);
    $stmt->bindParam(':email', $_POST['email']);
    
    // Hash the password before storing it in the database
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    // Execute the query
    if ($stmt->execute()) {
        $message = 'Successfully created new user';
        // Redirect to login page
        header("Location: login.php");
        exit(); // Ensure that no further code is executed after the redirect
    } else {
        $message = 'Sorry, there must have been an issue creating your account';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .login {
            min-height: 100vh;
        }

        .bg-image {
            background-image: url('assets/img/monkey_login.jpg');
            background-size: cover;
            background-position: center;
        }

        .login-heading {
            font-weight: 300;
        }

        .btn-login {
            font-size: 0.9rem;
            letter-spacing: 0.05rem;
            padding: 0.75rem 1rem;
        }

        .form-control,
        input[type="text"],
        input[type="password"] {
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: var(--bs-body-color);
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-color: var(--bs-body-bg);
            background-clip: padding-box;
            border: var(--bs-border-width) solid var(--bs-border-color);
            border-radius: var(--bs-border-radius);
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
    </style>
</head>

<body>


    <?php if (!empty($message)): ?>
        <p>
            <?= $message ?>
        </p>
    <?php endif; ?>
    <div class="container-fluid ps-md-0">
        <div class="row g-0">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h1 class="login-heading mb-4 text-center">Create Account</h1>
                                <form action="signup.php" method="post" class="needs-validation" novalidate>
                                    <div class="mb-3 mt-3">
                                        <label for="firstName" class="form-label">First Name:</label>
                                        <input type="text" class="form-control" id="firstName"
                                            placeholder="Enter your first name" name="first_name" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter your first name.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="lastName" class="form-label">Last Name:</label>
                                        <input type="text" class="form-control" id="lastName"
                                            placeholder="Enter your last name" name="last_name" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter your last name.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Enter your email" name="email" required
                                            pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a valid email address.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password:</label>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Enter password" name="password" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a password.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirm_password" class="form-label">Confirm Password:</label>
                                        <input type="password" class="form-control" id="confirm_password"
                                            placeholder="Confirm Password" name="confirm_password" required>
                                        <div class="valid-feedback">Passwords match!</div>
                                        <div class="invalid-feedback">Passwords do not match.</div>
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn btn-lg btn-dark btn-login text-uppercase fw-bold mb-2"
                                            type="submit">Sign Up</button>
                                    </div>
                                    <a href="login.php" class="text-decoration-none text-reset link-hover">
                                        <p>I have an account</p>
                                    </a>
                                </form>

                                <script>
                                    (function () {
                                        'use strict';

                                        window.addEventListener('load', function () {
                                            var forms = document.getElementsByClassName('needs-validation');

                                            var validation = Array.prototype.filter.call(forms, function (form) {
                                                form.addEventListener('submit', function (event) {
                                                    if (form.checkValidity() === false) {
                                                        event.preventDefault();
                                                        event.stopPropagation();
                                                    }
                                                    form.classList.add('was-validated');
                                                }, false);
                                            });
                                        }, false);
                                    })();
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>