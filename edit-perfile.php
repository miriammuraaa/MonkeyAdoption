<?php
session_start();

// Verificar si hay una sesión activa
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

// Incluir el archivo de configuración de la base de datos
require 'database.php';

// Obtener los datos del usuario desde la base de datos
$userID = $_SESSION['id'];
$records = $conn->prepare('SELECT id, first_name, last_name, email, phone_number, birthday, address FROM users WHERE id = :id');
$records->bindParam(':id', $userID);
$records->execute();
$user = $records->fetch(PDO::FETCH_ASSOC);

// Manejar la actualización de datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $newFirstName = isset($_POST['newFirstName']) ? $_POST['newFirstName'] : $user['first_name'];
    $newLastName = isset($_POST['newLastName']) ? $_POST['newLastName'] : $user['last_name'];
    $newEmail = isset($_POST['newEmail']) ? $_POST['newEmail'] : $user['email'];
    $newPhone = isset($_POST['newPhone']) ? $_POST['newPhone'] : $user['phone_number'];
    $newBirthday = isset($_POST['newBirthday']) ? $_POST['newBirthday'] : $user['birthday'];
    $newAddress = isset($_POST['newAddress']) ? $_POST['newAddress'] : $user['address'];

    // Validar si los campos son nulos y asignar un valor predeterminado
    $newPhone = $newPhone ?? ' ';
    $newBirthday = $newBirthday ?? ' ';
    $newAddress = $newAddress ?? ' ';

    // Actualizar los datos en la base de datos
    $updateStmt = $conn->prepare('UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, phone_number = :phone_number, birthday = :birthday, address = :address WHERE id = :id');
    $updateStmt->bindParam(':first_name', $newFirstName);
    $updateStmt->bindParam(':last_name', $newLastName);
    $updateStmt->bindParam(':email', $newEmail);
    $updateStmt->bindParam(':phone_number', $newPhone);
    $updateStmt->bindParam(':birthday', $newBirthday);
    $updateStmt->bindParam(':address', $newAddress);
    $updateStmt->bindParam(':id', $userID);

    if ($updateStmt->execute()) {
        // Redirigir a la página de perfil después de guardar los cambios
        header("Location: perfile.php");
        exit();
    } else {
        // Manejar el error si la actualización falla
        $updateError = "Error updating data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Monkey Adoption</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        ol.breadcrumb {
            background-color: #f8f9fa; /* Color de fondo */
            padding: 10px 0; /* Espaciado interno ajustado */
            margin-bottom: 0; /* Eliminar espacio inferior */
            border-radius: 4px; /* Bordes redondeados */
            margin-left: 20px;
        }

        /* Estilos para los elementos de breadcrumb */
        li.breadcrumb-item {
            display: inline-block;
            margin-right: 4px; /* Espacio entre elementos */
        }

        /* Estilos para el enlace dentro de los elementos de breadcrumb */
        li.breadcrumb-item a {
            color: #007bff; /* Color del enlace */
            text-decoration: none; /* Sin subrayado */
        }

        /* Estilos para el elemento activo (último elemento) */
        li.breadcrumb-item.active {
            color: #495057; /* Color del texto activo */
        }

        /* Estilos para el enlace dentro del elemento activo */
        li.breadcrumb-item.active a {
            color: #495057; /* Color del enlace activo */
        }
    </style>
</head>

<body>
    <?php require 'partials/header2.php' ?>
    <!-- Breadcrums -->
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="perfile.php">My perfile</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data</li>
    </ol>
</nav>

    <div class="container-fluid p-5 bg-dark text-white text-center">
        <h1>Edit Profile</h1>
        <p>Make changes to your profile below.</p>
    </div>

    <div id="user-datos" class="container-fluid">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 ">
                <div class="card h-90 m-5 w-60">
                    <div class="card-body">
                        <div class="account-settings text-center">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="assets/img/perfil.png" alt="Profile Picture">
                                </div>
                                <h5 class="user-name">
                                    <?= $user['first_name'] . ' ' . $user['last_name']; ?>
                                </h5>
                                <p class="user-email">
                                    <?= $user['email']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-90 m-5">
                    <div class="card-body m-2 ">
                        <div class="row gutters ">
                            <!-- Formulario para editar datos -->
                            <!-- <form method="POST" action=""> -->
                                <div method="POST" action="" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                                    <h6 class="mb-2 text-primary">Edit Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="newFirstName">
                                            <h6 class="user-name">
                                                Name:
                                            </h6>
                                        </label>
                                        <input type="text" class="form-control" id="newFirstName" name="newFirstName"
                                            value="<?= $user['first_name']; ?>">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="newLastName">
                                            <h6 class="user-name">
                                                Last name:
                                            </h6>
                                        </label>
                                        <input type="text" class="form-control" id="newLastName" name="newLastName"
                                            value="<?= $user['last_name']; ?>">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="newEmail">
                                            <h6 class="user-email">
                                                Email:
                                            </h6>
                                        </label>
                                        <input type="email" class="form-control" id="newEmail" name="newEmail"
                                            value="<?= $user['email']; ?>">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="newPhone">
                                            <h6 class="user-name">
                                                Phone:
                                            </h6>
                                        </label>
                                        <input type="text" class="form-control" id="newPhone" name="newPhone" placeholder="Enter your phone number"
                                            value="<?= $user['phone_number']; ?>">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="newBirthday">
                                            <h6 class="user-name">Birthday:</h6>
                                        </label>
                                        <input class="form-control" id="newBirthday" name="newBirthday" type="text"
                                            placeholder="YYYY-MM-DD" value="<?= $user['birthday']; ?>">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="form-group">
                                        <label for="newAddress">
                                            <h6 class="user-name">Address:</h6>
                                        </label>
                                        <input class="form-control" id="newAddress" name="newAddress" type="text"
                                            placeholder="Enter your address" value="<?= $user['address']; ?>">
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                                    <button type="submit" class="btn btn-dark mt-4">Save changes</button>
                                    <a href="perfile.php" class="btn bg-danger text-light mt-4">Cancel</a>
                                </div>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'footer.php' ?>
    <style>
        body {
            background: #f5f6fa;
        }

        #user-datos {
            margin: 0;
            padding-top: 40px;
            padding-bottom: 40px;
            color: #2e323c;
            background: #f5f6fa;
            position: relative;
            height: 100%;
        }

        .account-settings .user-profile {
            margin: 0 0 1rem 0;
            padding-bottom: 1rem;
            text-align: center;
        }

        .account-settings .user-profile .user-avatar {
            margin: 0 0 1rem 0;
        }

        .account-settings .user-profile .user-avatar img {
            width: 90px;
            height: 90px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
            border-radius: 100px;
        }

        .account-settings .user-profile h5.user-name {
            margin: 0 0 0.5rem 0;
        }

        .account-settings .user-profile h6.user-email {
            margin: 0;
            font-size: 0.8rem;
            font-weight: 400;
            color: #9fa8b9;
        }

        .account-settings .about {
            margin: 2rem 0 0 0;
            text-align: center;
        }

        .account-settings .about h5 {
            margin: 0 0 15px 0;
            color: #007ae1;
        }

        .account-settings .about p {
            font-size: 0.825rem;
        }

        .form-control {
            border: 1px solid #cfd1d8;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            font-size: .825rem;
            background: #ffffff;
            color: #2e323c;
        }

        .card {
            background: #ffffff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
        }
    </style>
</body>

</html>
