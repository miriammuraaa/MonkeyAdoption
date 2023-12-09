<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="assets/img/logo_sin_letra_blanco.png" alt="Logo" style="width:40px;"
                    class=" ms-3 rounded-pill">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item me-4">
                        <a class="nav-link" href="about_us.php">About Us</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="adoption.php">Adoption</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="donation.php">Donation</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                <li class="nav-item me-4">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="perfile.php">My perfile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</body>

</html>