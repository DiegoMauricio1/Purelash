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
                <img src="images/single.jpg" class="d-block w-100" alt="Single Lashes">
                <div class="service-info text-center mt-3 px-3">
                    <h3>Single Lashes</h3>
                    <p>Perfekt til dig der ønsker et diskret, men defineret resultat, med én extension per vippe.</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="images/brow.jpg" class="d-block w-100" alt="Brow Lamination">
                <div class="service-info text-center mt-3 px-3">
                    <h3>Brow Lamination</h3>
                    <p>Form og løft dine bryn, for et fyldigere, velplejet udtryk der holder.</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="images/hybrid.jpg" class="d-block w-100" alt="Hybrid Vipper">
                <div class="service-info text-center mt-3 px-3">
                    <h3>Hybrid Vipper</h3>
                    <p>En kombination af klassiske og volumen vipper, for et mere markant, men stadig naturligt look.</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="images/lash.jpg" class="d-block w-100" alt="Lash Lift">
                <div class="service-info text-center mt-3 px-3">
                    <h3>Lash Lift</h3>
                    <p>Få et løft og smuk kurve til dine egne vipper, helt uden extensions.</p>
                </div>
            </div>



            <div class="carousel-item">
                <img src="images/classic.jpg" class="d-block w-100" alt="Classic Lashes">
                <div class="service-info text-center mt-3 px-3">
                    <h3>Classic Lashes</h3>
                    <p>Naturlige og elegante extensions, der giver længde og definition, uden at overtage dit look.</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="images/rens.jpg" class="d-block w-100" alt="Aftagning af vipper og rens">
                <div class="service-info text-center mt-3 px-3">
                    <h3>Aftagning af vipper og rens</h3>
                    <p>Skånsom fjernelse af vipper, efterfulgt af rens for et frisk udgangspunkt.</p>
                </div>
            </div>

        </div>

        <div class="carousel-indicators position-static mt-3">
            <button type="button" data-bs-target="#servicesCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#servicesCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#servicesCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#servicesCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#servicesCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#servicesCarousel" data-bs-slide-to="5" aria-label="Slide 6"></button>
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
