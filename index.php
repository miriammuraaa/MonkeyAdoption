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
        .fakeimg {
            height: 200px;
            background: #aaa;
        }

        #demo {
            height: 650px;
            /* Ajusta el tamaño máximo del carrusel según tus necesidades */
            margin: auto;
            /* Centra el carrusel */
        }

        .carousel-inner img {
            width: 100%;
            /* Hace que las imágenes ocupen el ancho completo del contenedor */
            height: 650px;
            /* Hace que las imágenes ocupen la altura completa del contenedor */
            object-fit: cover;
            /* Cubre el contenedor, manteniendo la proporción y recortando según sea necesario */
        }

        .link-hover:hover {
            opacity: 0.8;
            /* Puedes ajustar este valor para cambiar la intensidad del oscurecimiento */
        }
    </style>
</head>

<body>
    <?php if (!empty($user)): ?>
        <?php require 'partials/header2.php' ?>
        
        <!-- <br> Welcome. 
        <?= $user['email']; ?>
        <br>You are Successfully Logged In
        <a href="logout.php">
            Logout
        </a> -->
        <?php require 'inicio.php' ?>
        <!-- Modal de inicio de sesión exitoso -->
        <!-- <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Inicio de Sesión Exitoso</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Bienvenido,
                            <?= $user['email']; ?>
                        </p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            window.onload = function  () {             var successModal = new bootstrap.Modal(document.getElementById('successModal'));             successModal.show();         };
        </script> -->
        <?php require 'footer.php' ?>
    <?php else: ?>
        <?php require 'partials/header.php' ?>

        <?php require 'inicio.php' ?>
        <?php require 'footer.php' ?>

    <?php endif; ?>
</body>

</html>