<?php
session_start();

require 'database.php';

if (isset($_SESSION['id'])) {
    $records = $conn->prepare('SELECT id, email, password_hash FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
        $user = $results;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Monkey Adoption</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/stile.css">
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
    <?php if (!empty($user)): ?>
        <?php require 'partials/header2.php' ?>
        <!-- Breadcrums -->
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Adoption</li>
    </ol>
</nav>
    <div class="container-fluid p-5 bg-dark text-white text-center">
        <h1>Adoption</h1>
    </div>
    <?php require 'adoption-monkeys.php' ?>
    <?php require 'footer.php' ?>
    <?php else: ?>
        <?php require 'partials/header.php' ?>
        <!-- Breadcrums -->
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Adoption</li>
    </ol>
</nav>
    <div class="container-fluid p-5 bg-dark text-white text-center">
        <h1>Adoption</h1>
    </div>
    <?php require 'adoption-monkeys.php' ?>
    <?php require 'footer.php' ?>
    <?php endif; ?>
</body>

</html>