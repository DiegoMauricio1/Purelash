<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <title>Purelash</title>
    <link rel="icon" href="icon/P%20L.png">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link href="https://api.fontshare.com/v2/css?f[]=nunito@400&f[]=melodrama@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta property="og:image" content="https://i.ibb.co/qH9S9kb/PURELASH.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3ca225fa5d.js" crossorigin="anonymous"></script>
</head>
<body>

<section id="navbar">
    <nav class="navbar">
        <img src="images/logo.png" alt="PureLash logo" class="logo">
        <a href="book_appointment.php" class="book-btn">Book tid</a>
    </nav>
</section>

<section id="hero">
    <div class="hero-video-wrapper">
        <video src="videos/hero-video.mp4" autoplay muted loop playsinline class="hero-video"></video>
    </div>
    <div class="hero-content">
        <h1>Skønhed starter<br>med detaljerne</h1>
        <p>Eksklusive lash- og browbehandlinger, der forfiner dine træk og fremhæver dit naturlige udtryk.</p>
        <a href="book_appointment.php" class="book-btn">Book nu</a>
    </div>
</section>

<section id="services" class="text-center py-5">
    <h2 class="section-title">Behandlinger</h2>
    <p class="section-description">
        Hos Purelash tilbyder vi professionelle behandlinger af vipper og bryn, alt fra lash lifts til extensions og brow lamination.
    </p>

    <div id="servicesCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="images/vippe.jpg" class="d-block w-100" alt="Vippe Extensions">
                <div class="service-info text-center mt-3 px-3">
                    <h3>Vippe Extensions</h3>
                    <p>Fuldend dit look med skræddersyede eyelash extensions, der tilpasses din øjenform og stil for et naturligt og fyldigt resultat hver gang.</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="images/lift.jpg" class="d-block w-100" alt="Lash Lift">
                <div class="service-info text-center mt-3 px-3">
                    <h3>Lash Lift</h3>
                    <p>Fremhæv dine naturlige vipper med et lash lift, der giver dem et elegant løft og åbner blikket, helt uden brug af extensions eller mascara.</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="images/bryn.jpg" class="d-block w-100" alt="Bryn">
                <div class="service-info text-center mt-3 px-3">
                    <h3>Bryn</h3>
                    <p>Få dine bryn til at se fyldigere og mere definerede ud med en brow lamination, der former og fastholder dem i den ønskede retning.</p>
                </div>
            </div>

        </div>

        <div class="carousel-indicators position-static mt-3">
            <button type="button" data-bs-target="#servicesCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#servicesCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#servicesCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
    </div>

</section>

<footer id="footer">
    <div class="footer-logo">
        <img src="images/logo.png" alt="PureLash Logo">
        <a href="admin/dashboard.php">
            <i class="fa-solid fa-user"></i>
        </a>
    </div>

    <div class="footer-info">
        <h3>Praktisk information</h3>
        <p><strong>Purelash Studio</strong></p>
        <p><strong>Studio tlf:</strong> 42 77 02 64</p>
        <p><strong>Mail:</strong> hej@purelash.dk</p>
        <p><strong>Adresse:</strong> Bispegade 5, 4800 Nykøbing Falster</p>
    </div>

    <div class="footer-social">
        <a href="https://www.instagram.com/purelash.dk/" target="_blank">
            <i class="fa-brands fa-instagram"></i>
        </a>
        <a href="https://www.tiktok.com/@purelashdk" target="_blank">
            <i class="fa-brands fa-tiktok"></i>
        </a>
    </div>

    <div class="footer-hours">
        <h3>Åbningstider</h3>
        <p><strong>Mandag–lørdag:</strong> kl. 10–20</p>
        <p><strong>Helligdage:</strong> Åbningstider kan variere</p>
    </div>

    <div class="footer-copy">
        <p>© 2025 PureLash. Alle rettigheder forbeholdes.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</body>
</html>
