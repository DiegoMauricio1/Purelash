<?php
require "settings/init.php"; // Forbinder til databasen og gør klar til at bruge den

// Starter med tomme værdier til formularfelterne
$customer_name = $phone_number = $email = $service_id = $appointment_date = $comments = "";
$message = "";

// Henter alle behandlinger fra databasen
$services_sql = "SELECT id, name, price FROM services";
$services_result = $db->sql($services_sql);
$services = [];

if (!empty($services_result)) {
    foreach ($services_result as $service_row) {
        $services[$service_row->id] = [
            'name' => $service_row->name,
            'price' => $service_row->price
        ];
    }
}

// Tjekker om brugeren har indsendt formularen
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Henter data fra formularen
    $customer_name = $_POST['customer_name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $service_id = $_POST['service'];
    $price = $services[$service_id]['price'];
    $appointment_date = $_POST['appointment_date'];
    $comments = $_POST['comments'];

    // Tjekker om alle felter er udfyldt
    if (empty($customer_name) || empty($phone_number) || empty($email) || empty($service_id) || empty($appointment_date) || empty($comments)) {
        $message = "Udfyld venligst alle felter.";
    } else {
        // Gemmer aftalen i databasen med status 'pending' (venter)
        $sql = "INSERT INTO appointments (customer_name, phone_number, email, service_id, appointment_date, comments, status) 
                VALUES (:customer_name, :phone_number, :email, :service_id, :appointment_date, :comments, 'pending')";

        $binds = [
            ":customer_name" => $customer_name,
            ":phone_number" => $phone_number,
            ":email" => $email,
            ":service_id" => $service_id,
            ":appointment_date" => $appointment_date,
            ":comments" => $comments
        ];

        $result = $db->sql($sql, $binds, false);

        if ($result) {
            // Sender en e-mail via web3forms om at en booking er blevet lavet
            $web3forms_data = [
                'access_key' => '6e72c9a7-97fc-42ef-9bef-c4b2951c3650',
                'Navn' => $customer_name,
                'Email' => $email,
                'telefon' => $phone_number,
                'Tjeneste' => $services[$service_id]['name'],
                'Dato' => $appointment_date,
                'Kommentar' => $comments,
                'subject' => 'En aftale er indsendt hos Purelash',
            ];

            $options = [
                'http' => [
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($web3forms_data),
                ],
            ];

            $context  = stream_context_create($options);
            $web3forms_result = file_get_contents("https://api.web3forms.com/submit", false, $context);

            // Viser en succesbesked og nulstiller felterne
            $message = "Bookingen er gennemført! <br> Din aftale afventer bekræftelse.";
            $customer_name = $phone_number = $email = $service_id = $appointment_date = $comments = "";
        } else {
            // Hvis noget gik galt
            $message = "Aftalen kunne ikke bookes. Prøv igen.";
        }
    }
}

// Finder alle datoer som allerede er booket (enten afventer eller accepteret)
$booked_dates_sql = "SELECT appointment_date FROM appointments WHERE status IN ('pending', 'accepted')";
$booked_dates_result = $db->sql($booked_dates_sql);
$booked_dates = [];

if (!empty($booked_dates_result)) {
    foreach ($booked_dates_result as $date_row) {
        $booked_dates[] = $date_row->appointment_date;
    }
}

$booked_dates_json = json_encode($booked_dates); // Konverterer datoerne til JSON, så de kan bruges i dato-vælgeren i frontend
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book en tid hos Purelash!</title>
    <link rel="icon" href="icon/P%20L.png">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link href="https://api.fontshare.com/v2/css?f[]=nunito@400&f[]=melodrama@500&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
</head>
<body>

<section id="booking-navbar">
    <nav class="navbar">
        <a href="index.php">
        <img src="images/logo.png" alt="PureLash logo" class="logo">
        </a>
    </nav>
</section>

<section id="book-appointment">

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="customer_name">Dit navn:</label>
    <input type="text" id="customer_name" placeholder="Skriv dit navn her" name="customer_name" value="<?php echo $customer_name; ?>" required>

    <label for="email">Din e-mailadresse:</label>
    <input type="email" id="email" placeholder="Skriv din e-mail her" name="email" value="<?php echo $email; ?>" required>

    <label for="phone_number">Dit telefonnummer:</label>
    <input type="tel" id="phone_number" placeholder="Skriv dit telefonnummer her" name="phone_number" value="<?php echo $phone_number; ?>" required>
    <br>
    <br>
    <label>Vælg behandling</label>
    <div class="service-options">
        <?php foreach ($services as $serviceId => $serviceData): ?>
            <label class="service-box">
                <input type="radio" name="service" value="<?php echo $serviceId; ?>" <?php if ($service_id == $serviceId) echo 'checked'; ?> required>
                <div class="service-info">
                    <strong><?php echo $serviceData['name']; ?></strong><br>
                    <?php echo $serviceData['price']; ?> DKK
                </div>
            </label>
        <?php endforeach; ?>
    </div>
    <label for="appointment_date">Vælg tidspunkt</label>
    <input type="text" id="appointment_date" name="appointment_date" value="<?php echo $appointment_date; ?>" readonly required>
    <small>Klik for at vælge en tilgængelig dato</small>
    <br>
    <br>
    <label for="comments">Eventuelle bemærkninger:</label>
    <textarea id="comments" name="comments"><?php echo $comments; ?></textarea>

    <button type="submit" class="book-submit-btn">Bestil tid</button>

</form>

<?php if (!empty($message)): ?>
    <div class="message <?php echo strpos($message, "successful") !== false ? 'success' : 'error'; ?>">
        <?php echo $message; ?>
    </div>
<?php endif; ?>

</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
        var bookedDates = <?php echo $booked_dates_json; ?>;
        $('#appointment_date').datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0,
            beforeShowDay: function(date) {
                var dateString = $.datepicker.formatDate('yy-mm-dd', date);
                var isBooked = ($.inArray(dateString, bookedDates) !== -1);
                var day = date.getDay();
                var isWeekend = (day === 0 || day === 6);
                return [(!isBooked && !isWeekend), ''];
            }
        });
    });
</script>
</body>
</html>
