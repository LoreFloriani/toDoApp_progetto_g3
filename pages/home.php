<?php
$eventi = [
        [
                "idEvento" => 1,
                "titolo" => "Evento 1",
                "descrizione" => "prova primo evento",
                "scadenza" => "2026-03-11 08:17:00",
                "stato" => 0,
                "categoria" => "lavoro"
        ],
        [
                "idEvento" => 2,
                "titolo" => "Evento 2",
                "descrizione" => "prova secondo evento",
                "scadenza" => "2026-03-15 15:17:00",
                "stato" => 0,
                "categoria" => "scuola"
        ],
        [
                "idEvento" => 3,
                "titolo" => "Consegna progetto",
                "descrizione" => "caricare progetto finale",
                "scadenza" => "2026-03-09 23:59:00",
                "stato" => 0,
                "categoria" => "scuola"
        ],
        [
                "idEvento" => 4,
                "titolo" => "Riunione team",
                "descrizione" => "call settimanale",
                "scadenza" => "2026-03-08 18:00:00",
                "stato" => 0,
                "categoria" => "lavoro"
        ],
        [
                "idEvento" => 5,
                "titolo" => "Pagamento bollette",
                "descrizione" => "luce e gas",
                "scadenza" => "2026-03-20 12:00:00",
                "stato" => 0,
                "categoria" => "personale"
        ],
        [
                "idEvento" => 6,
                "titolo" => "Verifica matematica",
                "descrizione" => "studio capitolo 5",
                "scadenza" => "2026-03-12 08:00:00",
                "stato" => 0,
                "categoria" => "scuola"
        ],
        [
                "idEvento" => 7,
                "titolo" => "Allenamento palestra",
                "descrizione" => "allenamento gambe",
                "scadenza" => "2026-03-07 19:30:00",
                "stato" => 0,
                "categoria" => "sport"
        ],
        [
                "idEvento" => 8,
                "titolo" => "Dentista",
                "descrizione" => "controllo annuale",
                "scadenza" => "2026-03-25 10:00:00",
                "stato" => 0,
                "categoria" => "salute"
        ],
        [
                "idEvento" => 9,
                "titolo" => "Studio fisica",
                "descrizione" => "ripasso capitolo onde",
                "scadenza" => "2026-03-10 17:00:00",
                "stato" => 0,
                "categoria" => "scuola"
        ],
        [
                "idEvento" => 10,
                "titolo" => "Cena con amici",
                "descrizione" => "ristorante in centro",
                "scadenza" => "2026-03-18 21:00:00",
                "stato" => 0,
                "categoria" => "sociale"
        ],
        [
                "idEvento" => 11,
                "titolo" => "Revisione auto",
                "descrizione" => "controllo generale",
                "scadenza" => "2026-03-30 09:00:00",
                "stato" => 0,
                "categoria" => "personale"
        ],
        [
                "idEvento" => 12,
                "titolo" => "Presentazione progetto",
                "descrizione" => "presentazione finale",
                "scadenza" => "2026-03-13 11:00:00",
                "stato" => 0,
                "categoria" => "lavoro"
        ]
];

$now = new DateTime();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Remindly - Home</title>
    <!-- CSS esterno -->
    <link rel="stylesheet" href="../css/homeStyle.css">
    <!-- JS -->
    <script defer src="../js/homeScript.js"></script>
</head>
<body>

<header>
    <div class="header-left">
        <img src="../img/logo.png" alt="Logo Remindly" class="logo-small">
        <h1>Remindly</h1>
    </div>
    <div class="header-right">
        <a href="index.html" class="btn-logout">Logout</a>
    </div>
</header>

<main>

    <section>
        <h2>🔴 Scadenze urgenti (entro 2 giorni)</h2>
        <div class="grid-eventi">
            <?php foreach ($eventi as $evento):
                $scadenza = new DateTime($evento["scadenza"]);
                $diff = (int)$now->diff($scadenza)->format("%r%a");
                if ($evento["stato"] == 0 && $diff <= 2):
                    ?>
                    <div class="evento" data-id="<?= $evento["idEvento"] ?>">
                        <h3><?= $evento["titolo"] ?></h3>
                        <p><?= $evento["descrizione"] ?></p>
                        <small><?= $evento["scadenza"] ?></small>
                        <span class="categoria"><?= $evento["categoria"] ?></span>
                    </div>
                <?php endif; endforeach; ?>
        </div>
    </section>

    <section>
        <h2>🟠 Scadenze vicine (entro 7 giorni)</h2>
        <div class="grid-eventi">
            <?php foreach ($eventi as $evento):
                $scadenza = new DateTime($evento["scadenza"]);
                $diff = (int)$now->diff($scadenza)->format("%r%a");
                if ($evento["stato"] == 0 && $diff > 2 && $diff <= 7):
                    ?>
                    <div class="evento" data-id="<?= $evento["idEvento"] ?>">
                        <h3><?= $evento["titolo"] ?></h3>
                        <p><?= $evento["descrizione"] ?></p>
                        <small><?= $evento["scadenza"] ?></small>
                        <span class="categoria"><?= $evento["categoria"] ?></span>
                    </div>
                <?php endif; endforeach; ?>
        </div>
    </section>

    <section>
        <h2>🟢 Scadenze lontane</h2>
        <div class="grid-eventi">
            <?php foreach ($eventi as $evento):
                $scadenza = new DateTime($evento["scadenza"]);
                $diff = (int)$now->diff($scadenza)->format("%r%a");
                if ($evento["stato"] == 0 && $diff > 7):
                    ?>
                    <div class="evento" data-id="<?= $evento["idEvento"] ?>">
                        <h3><?= $evento["titolo"] ?></h3>
                        <p><?= $evento["descrizione"] ?></p>
                        <small><?= $evento["scadenza"] ?></small>
                        <span class="categoria"><?= $evento["categoria"] ?></span>
                    </div>
                <?php endif; endforeach; ?>
        </div>
    </section>

    <details>
        <summary>✅ Eventi completati</summary>
        <div class="grid-eventi" id="completati">
            <?php foreach ($eventi as $evento):
                if ($evento["stato"] != 0):
                    ?>
                    <div class="evento completato" data-id="<?= $evento["idEvento"] ?>">
                        <h3><?= $evento["titolo"] ?></h3>
                        <p><?= $evento["descrizione"] ?></p>
                        <small><?= $evento["scadenza"] ?></small>
                        <span class="categoria"><?= $evento["categoria"] ?></span>
                    </div>
                <?php endif; endforeach; ?>
        </div>
    </details>

    <button class="floatingBtn">+</button>


</main>

</body>
</html>
