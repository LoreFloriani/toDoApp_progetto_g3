<?php
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

$utenti = [
    "lorenzo"     => "pass1234",
    "mario"       => "mario2024",
    "giulia"      => "giuliaPwd",
    "anna"        => "anna456",
    "paolo"       => "paolo789",
    "luca"        => "luca321",
    "francesca"   => "fraPass",
    "andrea"      => "andreapwd",
    "simone"      => "simo2025",
    "chiara"      => "chiara000"
];

if (isset($utenti[$username]) && $utenti[$username] === $password) {

    header("Location: ../home.php");
    
} else {
    
    echo ("<script>
            alert('Username o password errati!');
            window.location.href = '../login.html';
          </script>");
}


?>