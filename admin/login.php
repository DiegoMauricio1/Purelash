<?php
session_start(); // Starter sessionen, så vi kan gemme info om brugeren

// Hvis brugeren allerede er logget ind, sendes de direkte til admin-forsiden
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("Location: dashboard.php");
    exit;
}

require "../settings/init.php"; // Forbinder til databasen

$errorMsg = ""; // Besked hvis der er fejl ved login

// Tjekker om formularen er blevet sendt
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']); // Henter og fjerner mellemrum fra brugernavn
    $password = $_POST['password']; // Henter adgangskoden

    // Tjekker om begge felter er udfyldt
    if (empty($username) || empty($password)) {
        $errorMsg = "Indtast både brugernavn og adgangskode";
    } else {
        // Henter brugeren fra databasen
        $sql = "SELECT * FROM admin_users WHERE username = :username LIMIT 1";
        $user = $db->sql($sql, [":username" => $username]);

        // Tjekker om adgangskoden passer med det, der er gemt i databasen
        if ($user && password_verify($password, $user[0]->password)) {
            $_SESSION["loggedin"] = true; // Bruger er nu logget ind
            $_SESSION["username"] = $user[0]->username; // Gemmer brugernavn i session
            header("Location: dashboard.php"); // Sender videre til dashboard
            exit;
        } else {
            $errorMsg = "Forkert brugernavn eller adgangskode";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="icon" href="../icon/P%20L.png">
    <link href="https://api.fontshare.com/v2/css?f[]=nunito@400&f[]=melodrama@500&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>

<section id="admin-login">
    <div class="login-container">
        <h1>Purelash Admin Login</h1>

        <?php if (!empty($errorMsg)): ?>
            <div class="error-message">
                <?php echo htmlspecialchars($errorMsg); ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="username">Brugernavn</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Adgangskode</label>
                <input type="password" id="password" name="password">
            </div>

            <button type="submit">Login</button>
        </form>

        <div class="nav-link">
            <a href="../index.php">Tilbage til forsiden</a>
        </div>
    </div>

</section>

</body>
</html>