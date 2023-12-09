<?php
session_start();
require 'database.php';

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password_hash FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();

    // Verifica si hay resultados antes de intentar obtenerlos
    $results = $records->fetch(PDO::FETCH_ASSOC);

    if ($results && password_verify($_POST['password'], $results['password_hash'])) {
        $_SESSION['id'] = $results['id'];
        $message = 'Login successful.';
        $success = true;

        // Muestra el modal de éxito
        echo '<script>';
        echo 'document.addEventListener("DOMContentLoaded", function() {';
        echo 'var successModal = new bootstrap.Modal(document.getElementById("successModal"));';
        echo 'document.getElementById("successMessage").innerHTML = "' . $message . '";';
        echo 'successModal.show();';
        echo '});';
        echo '</script>';
        
        header("Location: /MonkeyAdoption");
        exit(); // Asegúrate de salir después de redirigir
    } else {
        $message = 'Sorry, those credentials do not match';

        // Muestra el modal de error
        echo '<script>';
        echo 'document.addEventListener("DOMContentLoaded", function() {';
        echo 'var errorModal = new bootstrap.Modal(document.getElementById("errorModal"));';
        echo 'document.getElementById("errorMessage").innerHTML = "' . $message . '";';
        echo 'errorModal.show();';
        echo '});';
        echo '</script>';
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

    <!-- Modal de éxito -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="successMessage"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de error -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Error!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="errorMessage"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
    <div class="container-fluid ps-md-0">
        <div class="row g-0">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto"">
                                <h1 class=" login-heading mb-4 text-center">Log In</h1>
                                <form action="login.php" method="POST" class="needs-validation" novalidate>
                                    <div class="mb-3 mt-3">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Enter your email" name="email" required
                                            pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a valid email address.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pwd" class="form-label">Password:</label>
                                        <input type="password" class="form-control" id="pwd"
                                            placeholder="Enter password" name="password" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a password.</div>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="rememberPasswordCheck" required>
                                        <label class="form-check-label" for="rememberPasswordCheck">
                                            I accept cookies
                                        </label>
                                        <div class="valid-feedback">You agree!</div>
                                        <div class="invalid-feedback">Please check this checkbox to continue.</div>
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn btn-lg btn-dark btn-login text-uppercase fw-bold mb-2"
                                            type="submit">Sign in</button>
                                    </div>
                                    <a href="signup.php" class="text-decoration-none text-reset link-hover">
                                        <p>I don't have an account</p>
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







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>