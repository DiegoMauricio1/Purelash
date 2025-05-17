<?php
require "settings/init.php"; // Forbinder til databasen

// Henter alle bookinger der er blevet accepteret, sammen med deres behandling og pris
$sql = "SELECT a.*, s.name AS service_name, s.price 
        FROM appointments a 
        JOIN services s ON a.service_id = s.id 
        WHERE a.status = 'accepted' 
        ORDER BY a.appointment_date ASC";

// Gemmer resultaterne i variablen $appointments
$appointments = $db->sql($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kommende bookinger</title>
    <link rel="icon" href="icon/P%20L.png">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://api.fontshare.com/v2/css?f[]=nunito@400&f[]=melodrama@500&display=swap" rel="stylesheet">

</head>
<body>

<section id="bookings">

    <h1>Kommende bookinger</h1>

    <div class="nav-links">
        <a href="index.php">Forside</a>
        <a href="admin/dashboard.php">Admin Panel</a>
    </div>

    <div class="bookings-container">
        <?php if (!empty($appointments)): ?>
            <?php foreach ($appointments as $appointment): ?>
                <div class="booking">
                    <h3><?php echo htmlspecialchars($appointment->service); ?></h3>
                    <div class="booking-details">
                        <p class="booking-date">
                            Date: <?php echo date('F j, Y', strtotime($appointment->appointment_date)); ?> at
                            <?php echo date('g:i A', strtotime($appointment->appointment_time)); ?>
                        </p>
                        <p><strong>Kunde:</strong>
                            <?php echo htmlspecialchars($appointment->customer_name); ?>
                        </p>
                        <p><strong>Behandling:</strong>
                            <?php echo htmlspecialchars($appointment->service_name); ?> - <?php echo htmlspecialchars($appointment->price); ?> DKK
                        </p>
                        <p><strong>E-mailadresse:</strong>
                            <?php echo htmlspecialchars($appointment->email); ?>
                        </p>
                        <p><strong>Telefonnummer:</strong>
                            <?php echo htmlspecialchars($appointment->phone_number); ?>
                        </p>
                        <?php if (!empty($appointment->comments)): ?>
                            <p><strong>Bemærkninger:</strong>
                                <?php echo htmlspecialchars($appointment->comments); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="no-bookings">
                <p>Ingen kommende bookinger på nuværende tidspunkt.</p>
            </div>
        <?php endif; ?>
    </div>

</section>

<script>
</script>
</body>
</html>