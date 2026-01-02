<?php
$eventi = [[
    "idEvento" => 1,
    "titolo" => "Evento 1",
    "descrizione" => "prova primo evento",
    "scadenza" => date("2026-3-11 8:17:00"),
    "stato" => 0,
    "categoria" => "lavoro"
    ],
    [
        "idEvento" => 2,
        "titolo" => "Evento 2",
        "descrizione" => "prova primo ",
        "scadenza" => date("2026-5-11 15:17:00"),
        "stato" => 0,
        "categoria" => "scuola"
    ]
    ];
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
    <a href="index.html">Logout</a>
</header>



<main>
    <?php
    foreach ($eventi as $evento) {
        echo "<div>
                <h1>".$evento["titolo"]."</h1>
                <h2>".$evento["descrizione"]."</h2>
</div>";
    }
    ?>
</main>

<footer>
    <p>by Lorenzo Floriani</p>
</footer>
</body>
</html>
