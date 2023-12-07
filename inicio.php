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
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="5"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/imagen1.jpg" alt="Los Angeles" class="d-block">
            </div>
            <div class="carousel-item">
                <img src="assets/img/imagen2.jpg" alt="Chicago" class="d-block">
            </div>
            <div class="carousel-item">
                <img src="assets/img/imagen3.jpg" alt="New York" class="d-block">
            </div>
            <div class="carousel-item">
                <img src="assets/img/imagen4.jpg" alt="New York" class="d-block">
            </div>
            <div class="carousel-item">
                <img src="assets/img/imagen5.jpg" alt="New York" class="d-block">
            </div>
            <div class="carousel-item">
                <img src="assets/img/imagen6.jpg" alt="New York" class="d-block">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <div class="container-fluid p-5 bg-dark text-white text-center">
        <h1 class="mb-4">
            Discover Our Charming Domestic Monkey Breeds</h1>
        <p>Explore diverse monkeys at MonkeyAdoption, each with a unique personality. Find your perfect companion among
            playful capuchins and affectionate marmosets</p>
    </div>

    <div class="container mt-3">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="assets/img/curious-capuchin.jpg" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">Curious Capuchin</h4>
                        <p class="card-text">Adventurous and playful, the capuchin is known for its intelligence and
                            love for fun.
                        </p>
                        <button class="btn btn-dark">Adopt</button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="assets/img/mischievous-marmoset.jpg" alt="Card image"
                        style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">Mischievous Marmoset</h4>
                        <p class="card-text">With its small size and affectionate nature, the marmoset becomes a loving
                            and loyal companion.</p>
                        <button class="btn btn-dark">Adopt</button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="assets/img/witty-siamang.jpg" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">Witty Siamang</h4>
                        <p class="card-text">Recognized for its distinctive call, the siamang is a sociable and
                            energetic monkey.</p>
                        <button class="btn btn-dark">Adopt</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm-12">
                <h2>About Us</h2>
                <h5>Monkey Adoption, Dec 7, 2020</h5>
                <img class="about-us-terreno" src="assets/img/about-us-terreno1.jpg" alt="about-us-terreno"
                    style="width:100%">
                <p class="mt-4">At MonkeyAdoption, we are passionate about providing a loving home for monkeys in need
                    and connecting them with dedicated families. With a deep commitment to animal welfare, our team
                    works tirelessly to deliver exceptional care and ensure an enriching environment for our beloved
                    primates.</p>
                <button class="btn btn-dark">More information</button>
            </div>
        </div>
    </div>

    <div class="bg-light p-5 text-center">
        <h2>Support Our Monkeys</h2>
        <p>Help our monkeys find a loving home and exceptional care. Make a difference today! </p>
        <button class="btn btn-dark">Donate now</button>
    </div>

    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/v3Yr5rB0t2E?si=4aNifo2_kb9btCCG"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
        </div>
    </div>
    <!-- Footer -->
    <div class="mt-5 p-4 bg-dark text-white text-center">
        <div class="row">
            <div class="col-lg-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="about-us.html" class="text-decoration-none text-reset link-hover">About Us</a></li>
                    <li><a href="adoption.html" class="text-decoration-none text-reset link-hover">Adoption</a></li>
                    <li><a href="donation.html" class="text-decoration-none text-reset link-hover">Donation</a></li>
                    <li><a href="contact.html" class="text-decoration-none text-reset link-hover">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h5>Social Media</h5>
                <ul class="list-unstyled">
                    <li><a href="#" target="_blank" class="text-decoration-none text-reset link-hover">Facebook</a></li>
                    <li><a href="#" target="_blank" class="text-decoration-none text-reset link-hover">Twitter</a></li>
                    <li><a href="#" target="_blank" class="text-decoration-none text-reset link-hover">Instagram</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h5>Legal</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-decoration-none text-reset link-hover">Cookies</a></li>
                    <li><a href="#" class="text-decoration-none text-reset link-hover">Privacy</a></li>
                </ul>
            </div>
        </div>
        <p>&copy; 2023 Monkey Adoption</p>
        <p>Angkor Wat, Krong Siem Reap, Cambodia</p>
        <p>Email: info@monkeyadoption.com | Phone: (123) 456-7890</p>
    </div>
</body>

</html>