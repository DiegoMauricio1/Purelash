<?php
session_start(); // Starter sessionen for at tjekke om admin er logget ind
require "../settings/init.php"; // Forbinder til databasen

// Tjekker om brugeren er logget ind
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php"); // Hvis ikke logget ind, sendes brugeren til login
    exit;
}

// Henter filtreringsvalg fra URL'en (status og dato)
$status_filter = isset($_GET['status']) ? $_GET['status'] : '';
$date_filter = isset($_GET['date']) ? $_GET['date'] : '';

// Bygger SQL-spørgsmål – starter med at hente alle bookinger med deres behandling og pris
$sql = "SELECT appointments.*, services.name AS service_name, services.price AS service_price
        FROM appointments
        LEFT JOIN services ON appointments.service_id = services.id";

// Her gemmes filtreringsbetingelser
$where_clauses = [];
$binds = [];

// Hvis der er valgt statusfilter, tilføjes det til SQL
if (!empty($status_filter)) {
    $where_clauses[] = "status = :status";
    $binds[":status"] = $status_filter;
}

// Hvis der er valgt datofilter, tilføjes det også
if (!empty($date_filter)) {
    $where_clauses[] = "appointment_date = :date";
    $binds[":date"] = $date_filter;
}

// Hvis der er nogen filtre, sæt dem ind i SQL'en
if (!empty($where_clauses)) {
    $sql .= " WHERE " . implode(' AND ', $where_clauses);
}

// Sortér bookingerne så de nyeste kommer først
$sql .= " ORDER BY appointment_date DESC";

// Kører forespørgslen og gemmer resultaterne
$appointments = $db->sql($sql, $binds);
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="icon" href="../icon/P%20L.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://api.fontshare.com/v2/css?f[]=nunito@400&f[]=melodrama@500&display=swap" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>

<section id="dashboard">

    <div class="dashboard-header">
        <h1>Purelash Admin Dashboard</h1>
        <div>
            <span>Velkommen, <?php echo htmlspecialchars($_SESSION["username"]); ?> !</span>
            <a href="logout.php" class="logout">Log ud</a>
        </div>
    </div>

    <?php if (empty($appointments)): ?>
        <div class="no-appointments">
            <p>Ingen aftaler fundet.</p>
        </div>
    <?php else: ?>

        <?php foreach ($appointments as $appointment): ?>
            <div class="appointment-card <?php echo $appointment->status; ?>">
                <div class="appointment-header">
                    <h2><?php echo htmlspecialchars($appointment->customer_name); ?></h2>
                    <span class="status-pill"><?php echo ucfirst($appointment->status); ?></span>
                </div>
                <div class="appointment-info">
                    <p><strong>Behandling:</strong> <?php echo htmlspecialchars($appointment->service_name); ?></p>
                    <p><strong>Pris:</strong> <?php echo $appointment->service_price; ?> DKK</p>
                    <p><strong>Dato:</strong> <?php echo $appointment->appointment_date; ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($appointment->email); ?></p>
                    <p><strong>Telefon:</strong> <?php echo htmlspecialchars($appointment->phone_number); ?></p>
                </div>

                <?php if ($appointment->status === 'pending'): ?>
                    <div class="appointment-actions">
                        <form action="update_booking.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $appointment->id; ?>">
                            <input type="hidden" name="status" value="accepted">
                            <button type="submit" class="btn btn-accept">Accepter</button>
                        </form>
                        <form action="update_booking.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $appointment->id; ?>">
                            <input type="hidden" name="status" value="denied">
                            <button type="submit" class="btn btn-deny">Afvis</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <a href="../bookings.php">
        <button class="upcoming-bookings">Kommende bookinger</button>
    </a>

</section>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
