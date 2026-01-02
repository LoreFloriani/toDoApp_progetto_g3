<?php
$errore = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    if ($username === $utente_corretto && $password === $password_corretta) {
        $_SESSION["utente"] = $username;
        header("Location: area_riservata.php");
        exit;
    } else {
        $errore = "Username o password errati";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My HTML5 Project</title>
    <link rel="stylesheet" href="../css/style.css">
    <script defer src="../js/script.js"></script>
</head>
<body>
<header>
    <h1>Remindly</h1>
</header>

<main>
    <h2>Login</h2>

    <form method="post" action="php/.php">
        <label>
            Username:
            <input type="text" name="username" required>
        </label><br><br>

        <label>
            Password:
            <input type="password" name="password" required>
        </label><br><br>

        <button type="submit">Accedi</button>
    </form>
</main>


</body>
</html>
