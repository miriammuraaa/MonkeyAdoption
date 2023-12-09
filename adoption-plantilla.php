<?php
session_start();

require 'database.php';

// Verificar si se proporciona un ID en la URL
if (isset($_GET['id'])) {
    // Obtener el ID de la URL
    $id = $_GET['id'];

    try {
        // Consultar la base de datos con el ID proporcionado
        $records = $conn->prepare('SELECT id, name, age, sex, breed, `date-of-birth`, description, img FROM monkeys WHERE id = :id');
        $records->bindParam(':id', $id);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $monkey = null;

        // Verificar si se encontraron resultados
        if (count($results) > 0) {
            $monkey = $results;
        } else {
            // Manejar el caso donde no se encuentra un mono con el ID proporcionado
            echo "No se encontró ningún mono con el ID proporcionado.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // Manejar el caso donde no se proporciona un ID
    echo "No se proporcionó un ID de mono.";
}

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
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <li class="breadcrumb-item"><a href="adoption.php">Adoption</a></li>
        <li class="breadcrumb-item active" aria-current="page">Monkey perfile</li>
    </ol>
</nav>
    <div class="container-fluid p-5 bg-dark text-white text-center">
        <h1>Adoption</h1>
    </div>
    <?php require 'adoption-plantilla2.php' ?>
    <?php require 'footer.php' ?>
    <?php else: ?>
        <?php require 'partials/header.php' ?>
        <!-- Breadcrums -->
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="adoption.php">Adoption</a></li>
        <li class="breadcrumb-item active" aria-current="page">Monkey perfile</li>
    </ol>
</nav>
    <div class="container-fluid p-5 bg-dark text-white text-center">
        <h1>Adoption</h1>
    </div>
    <?php require 'adoption-plantilla2.php' ?>
    <?php require 'footer.php' ?>
    <?php endif; ?>
</body>

</html>